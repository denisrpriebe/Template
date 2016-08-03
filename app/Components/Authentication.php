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
            Sess::store('_authUserId', $user->id);
        }

        return $user ? true : false;
    }

    public function user() {
        return User::find(Sess::get('_authUserId'));
    }

    public function logout() {
        Sess::remove('_authUserId');
    }

    public function guard() {
        if (!Sess::has('_authUserId')) {
            Redirect::to($this->guardRedirect);
        }
    }

}
