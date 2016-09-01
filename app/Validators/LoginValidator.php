<?php

namespace App\Validators;

use App\Contracts\ValidatorContract;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\NestedValidationException;
use App\Facades\Components\Session;
use App\Facades\Components\Redirect;
use App\Facades\Components\Input;

class LoginValidator implements ValidatorContract {

    /**
     * Perform the validation.
     * 
     */
    public function validate() {

        try {

            Validator::email()->notBlank()->assert(Input::post('email'));
            Validator::stringType()->notBlank()->assert(Input::post('password'));
            
        } catch (NestedValidationException $exception) {

            $exception->findMessages([
                'notBlank' => 'You are missing values in the form.',
                'email' => 'A valid email is required.'
            ]);

            Session::flash('alert', [
                'type' => 'danger',
                'title' => 'Form Error',
                'text' => $exception->getMessages()[0]
            ]);

            Redirect::referrer();
        }
    }

}
