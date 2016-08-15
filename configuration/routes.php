<?php

/**
 * Application Routes
 * 
 * Application routes may be configured here. Each route needs at least a
 * method, controller and name.
 */
return [
    
    /**
     * Seed the database.
     * 
     */
    '/seed-db' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Database\DatabaseController@seed',
        'name' => 'seed-db'
    ],
    
    

    '/login' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Login\LoginController@showLogin',
        'name' => 'login-page'
    ],
    
    '/do-login' => [
        'method' => 'post',
        'controller' => 'App\Controllers\Login\LoginController@doLogin',
        'name' => 'do-login'
    ],
    
    
    
    '/logout' => [
        'method' => 'get',
        'controller' => 'App\Controllers\Logout\LogoutController@logout',
        'name' => 'logout'
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
        'method' => 'get',
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
    ]
    
];
