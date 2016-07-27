<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models;
use App\Components;
use App\Facades\Configuration;

// Initialize the application
$application = new App\Core\Application();

// -----------------------------------------------------------------------------

// Load the application configuration files
$configuration = new Components\Configuration(array(
    'paths' => require_once __DIR__ . '/../configuration/paths.php',
    'database' => require_once __DIR__ . '/../configuration/database.php',
    'session' => require_once __DIR__ . '/../configuration/session.php',
    'encryption' => require_once __DIR__ . '/../configuration/encryption.php'
));

// Register the configuration with the application
$application->addComponent($configuration, '_configuration');

// -----------------------------------------------------------------------------

// Initialize the database component
$database = new Components\Database(array(
    'host' => Configuration::database('host'),
    'username' => Configuration::database('username'),
    'password' => Configuration::database('password'),
    'dbname' => Configuration::database('dbname')
));

// Register the database with the application
$application->addComponent($database, '_database');

// -----------------------------------------------------------------------------

// Initialize the session component
$session = new Components\Session(array(
    'name' => Configuration::session('name'),
    'timeout' => Configuration::session('timeout')
));

// Register the session with the application
$application->addComponent($session, '_session');

// -----------------------------------------------------------------------------

// Initialize the view component
$view = new Components\View(array(
    'views' => Configuration::paths('views'),
    'assets' => Configuration::paths('assets')
));

$view->integrate('Session', 'App\Facades\Session');
$view->integrate('View', 'App\Facades\View');

// Register the view with the application
$application->addComponent($view, '_view');

// -----------------------------------------------------------------------------

// Initialize the encryption component
$encryption = new Components\Encryption(array(
    'salt' => Configuration::encryption('salt'),
    'pepper' => Configuration::encryption('pepper')
));

// Register the encryption with the application
$application->addComponent($encryption, '_encryption');

// -----------------------------------------------------------------------------

// Initialize the input component
$input = new Components\Input(array());

//Register the input with the application
$application->addComponent($input, '_input');

// -----------------------------------------------------------------------------

$user = new Models\User();
$application->addModel($user, '_user');