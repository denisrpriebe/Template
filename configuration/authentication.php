<?php

/**
 * Authentication Configuration
 * 
 * Authentication settings may be configured here.
 */
return array ( 
    
    /**
     * The first value used in authenticating a user. Usually 'username' or
     * 'email'.
     * 
     */
    'name' => 'email',
    
    /**
     * The second value used in authenticating a user.
     * 
     */
    'password' => 'password',
    
    /**
     * Redirect an un-authenticated user to this location if the user
     * attempts to access a page that is being "guarded".
     * 
     */
    'guard-redirect' => '?/register'
    
);
