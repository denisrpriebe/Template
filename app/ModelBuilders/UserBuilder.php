<?php

namespace App\ModelBuilders;

use App\Contracts\ModelBuilderContract;
use App\Models\User;

class UserBuilder implements ModelBuilderContract {

    public function build($object) {
        $user = new User();
        $user->setId($object->id);
        $user->setEmail($object->email);
        $user->setFirstName($object->first_name);
        $user->setLastName($object->last_name);
        $user->setPassword($object->password);
        $user->setCreatedOn($object->created_on);
        $user->setUpdatedOn($object->updated_on);
        return $user;
    }

}
