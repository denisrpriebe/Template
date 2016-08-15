<?php

namespace App\Controllers\User;

use App\Controllers\Controller;
use App\Facades\Components\Session;
use App\Models\User;
use App\Facades\Components\Crypto;
use App\Facades\Components\Redirect;
use App\Facades\Components\Input;
use App\Facades\Components\Auth;

class UserController extends Controller {

    /**
     * 
     */
    public function updateSettings() {
        
        $user = User::find(Auth::user()->id);

        $newPassword = (Input::post('password') != '__USE_EXISTING__') ? Crypto::hash(Input::post('password')) : false;

        if ($newPassword) {
            $user->password = $newPassword;
        }

        $user->email = Input::post('email');
        $user->first_name = Input::post('first_name');
        $user->last_name = Input::post('last_name');

        $user->save();

        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Settings Updated',
            'text' => 'Your personal settings has been successfully updated.'
        ]);

        Redirect::referrer();
    }

}
