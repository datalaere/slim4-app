<?php

use DI\Container;
use Slim\Factory\AppFactory;

use App\Controllers\Controller;

use App\Middlewares\AuthMiddleware;

// Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment
try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

// Create Container
$container = new Container();
AppFactory::setContainer($container);

/**
 * Instantiate App
 *
 * In order for the factory to work you need to ensure you have installed
 * a supported PSR-7 implementation of your choice e.g.: Slim PSR-7 and a supported
 * ServerRequest creator (included with Slim PSR-7)
 */
$app = AppFactory::create();

// register our global middleware that uses route names
$app->add(new AuthMiddleware());

/**
  * The routing middleware should be added earlier than the ErrorMiddleware
  * Otherwise exceptions thrown from it will not be handled by the middleware
  */
$app->addRoutingMiddleware();

// Load settings
require 'config/settings.php';

// Load container
require 'config/container.php';

// Load error handler
require 'config/errors.php';

// Load database
require 'config/database.php';

// Load controllers
// require 'config/controllers.php';

// Load helpers
require 'helpers.php';

require_once __DIR__ . '/routes/web.php';
