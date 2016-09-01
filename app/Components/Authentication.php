<?php

namespace App\Components;

use App\Models\User;
use App\Components\Configuration;
use App\Components\Session;
use App\Components\Input;
use App\Components\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Authentication {

    /**
     * The first value used when authenticating users. Usually "username" or
     * "email".
     * 
     * @var string 
     */
    protected $name;

    /**
     * The second value used when authenticating users. Usually "password".
     * 
     * @var string
     */
    protected $password;

    /**
     * The location to redirect a user if they try to access a page without
     * the correct privileges.
     * 
     * @var string
     */
    protected $guardRedirect;

    /**
     * The current application session.
     * 
     * @var App\Components\Session 
     */
    protected $session;

    /**
     * The user that is being authenticated.
     * 
     * @var App\Models\User
     */
    protected $user;

    /**
     * The input component.
     * 
     * @var App\Components\Input
     */
    protected $input;

    /**
     * The redirect component.
     * 
     * @var App\Component\Redirect
     */
    protected $redirect;

    /**
     * Initialize a new authentication instance.
     * 
     * @param \App\Components\Configuration $configuration
     * @param \App\Components\Session $session
     * @param \App\Components\Input $input
     * @param \App\Components\Redirect $redirect
     * @param \App\Models\User $user
     */
    public function __construct(Configuration $configuration, Session $session, Input $input, Redirect $redirect, User $user) {

        $this->name = $configuration->authentication('name');
        $this->password = $configuration->authentication('password');
        $this->guardRedirect = $configuration->authentication('guard-redirect');

        $this->session = $session;
        $this->input = $input;
        $this->redirect = $redirect;

        $this->user = $user;
    }

    /**
     * Attempt to authenticate a user with the given credentials.
     * 
     * @param array $credentials
     * @return boolean
     */
    public function check(array $credentials) {

        try {

            $user = User::where($this->name, '=', $credentials[$this->name])
                    ->where($this->password, '=', $credentials[$this->password])
                    ->firstOrFail();

            $this->session->store('_authUserId', $user->id);
            return true;
        } catch (ModelNotFoundException $ex) {

            return false;
        }
    }

    /**
     * The authenticated user.
     * 
     * @return App\Models\User | false
     */
    public function user() {
        try {
            return $this->user->findOrFail($this->session->get('_authUserId'));
        } catch (ModelNotFoundException $ex) {
            return false;
        }
    }

    /**
     * Logs out the current authenticated user.
     * 
     */
    public function logout() {
        $this->session->remove('_authUserId');
        $this->session->remove('_history');
    }

    /**
     * Protects a page against un-authenticated users.
     * 
     */
    public function guard() {
        if (!$this->session->has('_authUserId')) {

            $this->session->flash('alert', [
                'type' => 'warning',
                'title' => 'Authentication Required',
                'text' => 'You must be logged in to access this system.'
            ]);

            $this->redirect->to($this->guardRedirect);
        }
    }

    public function userIsAuthorized(array $route) {
        foreach ($route['allowed'] as $allowedRole) {
            if ($this->user()->hasRole($allowedRole)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Allows only POST requests to access a page.
     * 
     */
    public function post() {
        if ($this->input->method() != 'POST') {

            $this->session->flash('alert', [
                'type' => 'warning',
                'title' => 'Bad Method',
                'text' => 'You cannot access that page like this.'
            ]);

            $this->redirect->to($this->guardRedirect);
        }
    }

    /**
     * Allows only GET requests to access a page.
     * 
     */
    public function get() {
        if ($this->input->method() != 'GET') {

            $this->session->flash('alert', [
                'type' => 'warning',
                'title' => 'Bad Method',
                'text' => 'You cannot access that page like this.'
            ]);

            $this->redirect->to($this->guardRedirect);
        }
    }

}
