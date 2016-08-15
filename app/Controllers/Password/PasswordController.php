<?php

namespace App\Controllers\Password;

use App\Controllers\Controller;
use App\Facades\Components\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Facades\Components\Input;
use App\Facades\Components\Session;
use App\Facades\Components\Redirect;
use Carbon\Carbon;
use App\Facades\Components\Crypto;
use App\Facades\Components\Mail;

class PasswordController extends Controller {

    /**
     * 
     */
    public function showForgotPassword() {
        View::show('pages/forgot-password');
    }

    /**
     * 
     */
    public function showResetPassword() {
        View::add('passwordResetToken', Input::url('fragment'));
        View::show('pages/reset-password');
    }

    /**
     * 
     */
    public function resetPassword() {

        try {

            $user = User::where('password_reset_token', '=', Input::post('password_reset_token'))
                    ->firstOrFail();
        } catch (ModelNotFoundException $ex) {

            Session::flash('alert', [
                'type' => 'danger',
                'title' => 'Valid Token Required',
                'text' => 'A password reset token was not found or is invalid.'
            ]);

            Redirect::route('forgot-password-page');
        }

        $passwordExpiresDateTime = Carbon::createFromTimestamp(strtotime($user->password_reset_expires));
        $now = Carbon::now();

        // Did the user wait too long to reset their password?
        if ($passwordExpiresDateTime->lt($now)) {

            Session::flash('alert', [
                'type' => 'warning',
                'title' => 'Password Reset Expired',
                'text' => 'You password reset session has expired. Please fill out the form below to get a new password reset email.'
            ]);

            Redirect::route('forgot-password-page');
        }

        $user->password = Crypto::hash(Input::post('password'));
        $user->save();

        Session::flash('alert', [
            'type' => 'success',
            'title' => 'Password Reset',
            'text' => 'Your password has been successfully reset. Please login below.'
        ]);

        Redirect::route('login-page');
    }

    /**
     * 
     */
    public function sendForgotPasswordEmail() {

        try {

            $user = User::where('email', '=', Input::post('email'))->firstOrFail();
        } catch (ModelNotFoundException $ex) {

            Session::flash('alert', [
                'type' => 'danger',
                'title' => 'Unknown Email',
                'text' => 'The email "' . Input::post('email') . '" is not in our system. Please try a different email or register for a new account.'
            ]);

            Redirect::route('forgot-password-page');
        }

        $user->password_reset_token = Crypto::passwordResetToken();
        $user->password_reset_expires = Carbon::now()->addMinutes(10)->toDateTimeString();

        $user->save();

        View::add('user', $user);

        $emailSent = Mail::send([
            'to' => $user->email,
            'subject' => 'Template Test Email',
            'body' => View::make('emails/reset-password-email')
        ]);

        if ($emailSent) {

            Session::flash('alert', [
                'type' => 'success',
                'title' => 'Password Reset Email Sent',
                'text' => 'A password reset email has been sent to "' . $user->email . '". Please follow the instructions in this email to reset your password.'
            ]);

            Redirect::route('login-page');
        } else {

            Session::flash('alert', [
                'type' => 'danger',
                'title' => 'Email Failure',
                'text' => 'There was a problem trying to send the password reset email.'
            ]);

            Redirect::route('login-page');
        }
    }

}
