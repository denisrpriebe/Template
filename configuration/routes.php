<?php

/**
 * Application Routes
 *
 * Application routes may be configured here. Each route needs at least a
 * method, controller and name. An 'allowed' may also be added to routes that
 * require the user to be authenticated.
 */
return [

    /**
     * Seeds the database.
     *
     */
    '/db/seed' => [
        'method' => 'get',
        'controller' => 'Database\DatabaseController@seed',
        'name' => 'seed-db'
    ],

    /**
     * Logging In
     *
     */
    '/login' => [
        'method' => 'get',
        'controller' => 'Login\LoginController@show',
        'name' => 'login-page'
    ],

    '/login/do' => [
        'method' => 'post',
        'controller' => 'Login\LoginController@login',
        'name' => 'login'
    ],

    /**
     * Logging Out
     *
     */
    '/logout' => [
        'method' => 'get',
        'controller' => 'Logout\LogoutController@logout',
        'name' => 'logout-page'
    ],


    /**
     * Registration
     *
     */
    '/register' => [
        'method' => 'get',
        'controller' => 'Registration\RegistrationController@show',
        'name' => 'registration-page'
    ],

    '/register/do' => [
        'method' => 'post',
        'controller' => 'Registration\RegistrationController@register',
        'name' => 'register'
    ],

    /**
     * Password Management
     *
     */
    '/password/forgot' => [
        'method' => 'get',
        'controller' => 'Password\PasswordController@show',
        'name' => 'forgot-password-page'
    ],
    
    '/password/reset' => [
        'method' => 'get',
        'controller' => 'Password\PasswordController@showResetPassword',
        'name' => 'reset-password-page'
    ],

    '/password/reset/do' => [
        'method' => 'post',
        'controller' => 'Password\PasswordController@doResetPassword',
        'name' => 'reset-password'
    ],

    '/password/email' => [
        'method' => 'post',
        'controller' => 'Password\PasswordController@sendForgotPasswordEmail',
        'name' => 'send-forgot-password-email'
    ],

    /**
     * Navbar
     * 
     */
    '/auth/update-user-settings' => [
        'method' => 'post',
        'controller' => 'User\UserController@updateSettings',
        'allowed' => ['Administrator', 'Default'],
        'name' => 'update-user-settings'
    ],
    
    /**
     * Dashboard
     * 
     */
    '/auth/dashboard' => [
        'method' => 'get',
        'controller' => 'Auth\DashboardController@show',
        'allowed' => ['Administrator', 'Default'],
        'name' => 'dashboard-page'
    ],

    /**
     * Inventory
     * 
     */
    '/auth/inventory' => [
        'method' => 'get',
        'controller' => 'Inventory\InventoryController@show',
        'allowed' => ['Administrator', 'Default'],
        'name' => 'inventory-page'
    ],
    
    /**
     * Users
     * 
     */
    '/auth/users' => [
        'method' => 'get',
        'controller' => 'User\UserController@showUsers',
        'guard' => 'guard',
        'allowed' => ['Administrator'],
        'name' => 'users-page'
    ]

];
