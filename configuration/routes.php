<?php

return array(

    '/login' => array(
        'method' => 'get',
        'controller' => 'App\Controllers\Login\LoginController@showLogin',
        'name' => 'login-page'
    ),
    
    '/doLogin' => array(
        'method' => 'post',
        'controller' => 'App\Controllers\Login\LoginController@doLogin',
        'name' => 'do-login'
    ),
    
    '/logout' => array(
        'method' => 'get',
        'controller' => 'App\Controllers\Logout\LogoutController@logout',
        'name' => 'logout'
    ),
    
    '/register' => array(
        'method' => 'get',
        'controller' => 'App\Controllers\Register\RegistrationController@showRegistration',
        'name' => 'registration-page'
    ),
    
    '/forgot-password' => array(
        'method' => 'get',
        'controller' => 'App\Controllers\Password\PasswordController@showForgotPassword',
        'name' => 'forgot-password-page'
    ),

    '/auth/dashboard' => array(
        'method' => 'get',
        'controller' => 'App\Controllers\Auth\DashboardController@showDashboard',
        'guard' => 'guard',
        'name' => 'auth-dashboard'
    ),

);
