<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models;
use App\Components;
use App\Facades\Config;

// Initialize the application
$application = new App\Core\Application();

// -----------------------------------------------------------------------------
// | Register Components
// -----------------------------------------------------------------------------
// | Components may be initialized here and also registered with the
// | application core.
// -----------------------------------------------------------------------------

// Load the application configuration files
$configuration = new Components\Configuration(array(
    'paths' => require_once __DIR__ . '/../configuration/paths.php',
    'database' => require_once __DIR__ . '/../configuration/database.php',
    'session' => require_once __DIR__ . '/../configuration/session.php',
    'encryption' => require_once __DIR__ . '/../configuration/encryption.php',
    'mail' => require_once __DIR__ . '/../configuration/mail.php',
    'authentication' => require_once __DIR__ . '/../configuration/authentication.php'
));

// Register the configuration with the application
$application->addComponent($configuration, '_configuration');

// -----------------------------------------------------------------------------

// Initialize the database component
$database = new Components\Database(array(
    'host' => Config::database('host'),
    'username' => Config::database('username'),
    'password' => Config::database('password'),
    'dbname' => Config::database('dbname')
));

// Register the database with the application
$application->addComponent($database, '_database');

// -----------------------------------------------------------------------------

// Initialize the session component
$session = new Components\Session(array(
    'name' => Config::session('name'),
    'timeout' => Config::session('timeout')
));

// Register the session with the application
$application->addComponent($session, '_session');

// -----------------------------------------------------------------------------

// Initialize the view component
$view = new Components\View(array(
    'views' => Config::paths('views'),
    'assets' => Config::paths('assets')
));

$view->integrate('Session', 'App\Facades\Session');
$view->integrate('View', 'App\Facades\View');

// Register the view with the application
$application->addComponent($view, '_view');

// -----------------------------------------------------------------------------

// Initialize the encryption component
$encryption = new Components\Encryption(array(
    'salt' => Config::encryption('salt'),
    'pepper' => Config::encryption('pepper')
));

// Register the encryption with the application
$application->addComponent($encryption, '_encryption');

// -----------------------------------------------------------------------------

// Initialize the input component
$input = new Components\Input(array());

// Register the input with the application
$application->addComponent($input, '_input');

// -----------------------------------------------------------------------------

// Initialize the mail component
$mail = new Components\Mail(array(
    'host' => Config::mail('host'),
    'username' => Config::mail('username'),
    'password' => Config::mail('password'),
    'encryption' => Config::mail('encryption'),
    'port' => Config::mail('port')
));

// Register the mail with the application
$application->addComponent($mail, '_mail');

// -----------------------------------------------------------------------------

$authentication = new Components\Authentication(array(
   'name' => Config::authentication('name'),
   'password' => Config::authentication('password'),
   'guard-redirect' => Config::authentication('guard-redirect')
));

// Register the authentication with the application
$application->addComponent($authentication, '_authentication');

// -----------------------------------------------------------------------------

$redirect = new Components\Redirect(array(
    'public' => Config::paths('public')
));

$application->addComponent($redirect, '_redirect');

// -----------------------------------------------------------------------------
// | Register Models
// -----------------------------------------------------------------------------
// | Models may be initialized here and also registered with the
// | application core.
// -----------------------------------------------------------------------------

$user = new Models\User();
$application->addModel($user, '_user');