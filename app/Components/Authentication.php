<?php

namespace App\Components;

use App\Models\User;
use App\Components\Configuration;
use App\Components\Session;
use App\Components\Input;
use App\Components\Redirect;

class Authentication {

    protected $name;
    protected $password;
    protected $guardRedirect;
    protected $session;
    protected $user;
    protected $input;
    protected $redirect;

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
     * 
     * @param array $credentials
     * @return type
     */
    public function check(array $credentials) {

        $user = $this->user->where(array(
            array($this->name, '=', $credentials[$this->name]),
            array($this->password, '=', $credentials[$this->password])
        ));

        if ($user) {
            $this->session->store('_authUserId', $user->id);
        }

        return $user ? true : false;
    }

    /**
     * 
     * @return type
     */
    public function user() {
        return $this->user->find($this->session->get('_authUserId'));
    }

    /**
     * 
     */
    public function logout() {
        $this->session->remove('_authUserId');
        $this->session->remove('_history');
    }

    /**
     * 
     */
    public function guard() {
        if (!$this->session->has('_authUserId')) {

            $this->session->flash('alert', array(
                'type' => 'warning',
                'title' => 'Authentication Required',
                'text' => 'You must be logged in to access this system.'
            ));

            $this->redirect->to($this->guardRedirect);
        }
    }

    public function post() {
        if ($this->input->method() != 'POST') {

            $this->session->flash('alert', array(
                'type' => 'warning',
                'title' => 'Bad Method',
                'text' => 'You cannot access that page like this.'
            ));

            $this->redirect->to($this->guardRedirect);
        }
    }

    public function get() {
        if ($this->input->method() != 'GET') {

            $this->session->flash('alert', array(
                'type' => 'warning',
                'title' => 'Bad Method',
                'text' => 'You cannot access that page like this.'
            ));

            $this->redirect->to($this->guardRedirect);
        }
    }

}
