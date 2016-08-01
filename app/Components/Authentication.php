<?php

namespace App\Components;

use App\Contracts\ComponentContract;
use App\Facades\Models\User;
use App\Facades\Session as Sess;
use App\Facades\Redirect;

class Authentication implements ComponentContract {

    protected $name;
    protected $password;
    protected $guardRedirect;

    public function __construct(array $settings) {
        $this->name = $settings['name'];
        $this->password = $settings['password'];
        $this->guardRedirect = $settings['guard-redirect'];
    }

    public function check(array $credentials) {

        $user = User::where(array(
            array($this->name, '=', $credentials[$this->name]),
            array($this->password, '=', $credentials[$this->password])
        ));

        if ($user) {
            Sess::store('_user', $user);
        }

        return $user ? true : false;
    }

    public function user() {
        return Sess::get('_user');
    }

    public function logout() {
        Sess::remove('_user');
    }

    public function guard() {
        if (!$this->user()) {
            Redirect::to($this->guardRedirect);
        }
    }

}
