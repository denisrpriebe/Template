<?php

namespace App\Models;

use App\Models\Model;

class User extends Model {

    /**
     * The table this model represents.
     *
     * @var type
     */
    protected $tableName = 'users';
    
    public function roles() {
        return $this->hasManyPivot('App\Models\UserRole', 'user_id', 'App\Models\Role', 'role_id');
    }
    

}
