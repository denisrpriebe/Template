<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    /**
     *
     * @var type 
     */
    protected $table = 'users';

    /**
     *
     * @var type 
     */
    protected $fillable = array(
        'email', 'first_name', 'last_name', 'password', 'password_reset_token', 'password_reset_expires'
    );

    /**
     * Returns all of the user's roles.
     * 
     * @return type
     */
    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'user_roles', 'user_id', 'role_id');
    }

    /**
     * Checks if the user has the given role.
     * 
     * @param string $roleName
     * @return boolean
     */
    public function hasRole($roleName) {
        
        foreach ($this->roles as $role) {
            if (strtolower($roleName) == strtolower($role->role)) {
                return true;
            }
        }
        
        return false;
    }

}
