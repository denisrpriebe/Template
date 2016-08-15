<?php

/**
 * Application Routes
 * 
 * Application routes may be configured here. Each route needs at least a
 * method, controller and name. A guard may also be added to routes that
 * require the user to be authenticated.
 */
return [
    
    /**
     * Seeds the database.
     * 
     */
    '/seed-db' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Database\DatabaseController@seed',
        'name' => 'seed-db'
    ],
    
    /**
     * Login Page
     * 
     */
    '/login' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Login\LoginController@showLogin',
        'name' => 'login-page'
    ],
    
    /**
     * Do Login
     * 
     */
    '/do-login' => [
        'method' => 'post',
        'controller' => 'App\Controllers\Login\LoginController@doLogin',
        'name' => 'do-login'
    ],
    
    /**
     * Do Logout
     * 
     */
    '/logout' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Logout\LogoutController@logout',
        'name' => 'logout-page'
    ],
    
    
    
    '/register' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Register\RegistrationController@showRegistration',
        'name' => 'registration-page'
    ],
    
    '/do-registration' => [
        'method' => 'post',
        'controller' => 'App\Controllers\Register\RegistrationController@doRegistration',
        'name' => 'do-registration'
    ],
    
    
    
    '/forgot-password' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Password\PasswordController@showForgotPassword',
        'name' => 'forgot-password-page'
    ],
    
    '/reset-password' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Password\PasswordController@showResetPassword',
        'name' => 'reset-password-page'
    ],
    
    '/do-reset-password' => [
        'method' => 'post',
        'controller' => 'App\Controllers\Password\PasswordController@doResetPassword',
        'name' => 'do-reset-password'
    ],
    
    '/send-forgot-password-email' => [
        'method' => 'post',
        'controller' => 'App\Controllers\Password\PasswordController@sendForgotPasswordEmail',
        'name' => 'send-forgot-password-email'
    ],

    '/auth/dashboard' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Auth\DashboardController@showDashboard',
        'guard' => 'guard',
        'name' => 'auth-dashboard-page'
    ],

    '/auth/update-user-settings' => [
        'method' => 'post',
        'controller' => 'App\Controllers\User\UserController@updateSettings',
        'guard' => 'guard',
        'name' => 'update-user-settings'
    ],
    
    '/auth/inventory' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Inventory\InventoryController@showInventory',
        'guard' => 'guard',
        'name' => 'auth-inventory-page'
    ]
    
];
