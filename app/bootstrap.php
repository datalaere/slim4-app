<?php

use DI\Container;
use Psr\Container\ContainerInterface;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

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

// Set view in Container
$container->set('view', function() {
    return Twig::create(__DIR__ . '/resources/views', 
    ['cache' => getenv('VIEW_CACHE_DISABLED') ? false : __DIR__ . '/../storage/views']);
});

$container->set('settings', function () {
    return [
        'displayErrorDetails' => getenv('APP_DEBUG')  ? getenv('APP_DEBUG') : false,

        'app' => [
            'name' => getenv('APP_NAME') ? getenv('APP_NAME') : 'Slim4 App',
        ],
    ];
});

/**
  * The routing middleware should be added earlier than the ErrorMiddleware
  * Otherwise exceptions thrown from it will not be handled by the middleware
  */
$app->addRoutingMiddleware();

// Set the base path to run the app in a subdirectory.
// This path is used in urlFor().
$app->add(new BasePathMiddleware($app));

/**
 * Add Error Middleware
 *
 * @param bool                  $displayErrorDetails -> Should be set to false in production
 * @param bool                  $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool                  $logErrorDetails -> Display error details in error log
 * @param LoggerInterface|null  $logger -> Optional PSR-3 Logger  
 *
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$app->addErrorMiddleware(true, false, false);

// Add Twig-View Middleware
$app->add(TwigMiddleware::createFromContainer($app));

require_once __DIR__ . '/routes/web.php';
