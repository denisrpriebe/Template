<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Set our timezone
ini_set("date.timezone", "America/Chicago");

use App\Components\Configuration as ConfigurationComponent;
use App\Components\Database as DatabaseComponent;
use App\Components\Input as InputComponent;
use App\Components\Session as SessionComponent;
use App\Components\Authentication as AuthenticationComponent;
use App\Components\Encryption as EncryptionComponent;
use App\Components\Mail as MailComponent;
use App\Components\Redirect as RedirectComponent;
use App\Components\View as ViewComponent;
use App\Components\Navigation as NavigationComponent;
use App\Components\Route as RouteComponent;
use App\Components\Validator as ValidatorComponent;
use App\Components\Flash as FlashComponent;

use App\Models\User;

// Initialize the application
$application = new App\Core\Application();

// Load the application configuration files
$configuration = new ConfigurationComponent(array(
    'application' => require_once __DIR__ . '/../configuration/application.php',
    'paths' => require_once __DIR__ . '/../configuration/paths.php',
    'database' => require_once __DIR__ . '/../configuration/database.php',
    'session' => require_once __DIR__ . '/../configuration/session.php',
    'encryption' => require_once __DIR__ . '/../configuration/encryption.php',
    'mail' => require_once __DIR__ . '/../configuration/mail.php',
    'authentication' => require_once __DIR__ . '/../configuration/authentication.php',
    'navigation' => require_once __DIR__ . '/../configuration/navigation.php',
    'routes' => require_once __DIR__ . '/../configuration/routes.php'
));

$input = new InputComponent();
$validator = new ValidatorComponent();
$database = new DatabaseComponent($configuration);
$encryption = new EncryptionComponent($configuration);
$mail = new MailComponent($configuration);
$navigation = new NavigationComponent($configuration);
$view = new ViewComponent($configuration);
$route = new RouteComponent($configuration);
$session = new SessionComponent($configuration, $input);
$flash = new FlashComponent($session);
$redirect = new RedirectComponent($configuration, $session, $route);
$authentication = new AuthenticationComponent($configuration, $session, $input, $redirect, new User);

$view->integrate('Config', 'App\Facades\Components\Config');
$view->integrate('Session', 'App\Facades\Components\Session');
$view->integrate('View', 'App\Facades\Components\View');
$view->integrate('Nav', 'App\Facades\Components\Nav');
$view->integrate('Auth', 'App\Facades\Components\Auth');
$view->integrate('Route', 'App\Facades\Components\Route');

$application->addComponent($configuration, 'configuration');
$application->addComponent($database, 'database');
$application->addComponent($input, 'input');
$application->addComponent($session, 'session');
$application->addComponent($encryption, 'encryption');
$application->addComponent($mail, 'mail');
$application->addComponent($authentication, 'authentication');
$application->addComponent($redirect, 'redirect');
$application->addComponent($navigation, 'navigation');
$application->addComponent($view, 'view');
$application->addComponent($route, 'route');
$application->addComponent($validator, 'validator');
$application->addComponent($flash, 'flash');

$GLOBALS['app'] = $application;