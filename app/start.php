<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Database;
use App\Components\Session;
use App\Components\View;

// Load our configuration files
$pathConfig = require_once __DIR__ . '/../configuration/paths.php';
$dbConfig = require_once __DIR__ . '/../configuration/database.php';
$sessionConfig = require_once __DIR__ . '/../configuration/session.php';

$application = new App\Core\Application();

/*******************************************************************************
 * Create our components
 * 
 * Components are a great way to add functionality to your app.
 * A few have been created below.
 */

// Create our database component
$database = new Database($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname']);
$database->setKey('database');

// Create our session component
$session = new Session($sessionConfig['name']);
$session->setKey('session');

// Create our view component
$view = new View($pathConfig['views'], $pathConfig['assets']);
$view->integrate('Session', 'App\Facades\Session');
$view->integrate('View', 'App\Facades\View');
$view->setKey('view');

/*******************************************************************************
 * Add the components to the app.
 * 
 * We need to register our components with the application.
 * This may be done below.
 */
$application->addComponent($database);
$application->addComponent($session);
$application->addComponent($view);