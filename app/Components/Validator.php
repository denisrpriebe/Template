<?php

namespace App\Components;

use App\Contracts\ValidatorContract;

/**
 * Description of Validator
 *
 * @author drpriebe
 */
class Validator {
    
    /**
     * Run the validation.
     * 
     * @param ValidatorContract $validator
     */
    public function run(ValidatorContract $validator) {
        $v = new $validator;
        $v->validate();
    }
    
}
