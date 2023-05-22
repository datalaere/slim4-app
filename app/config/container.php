<?php

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Selective\BasePath\BasePathMiddleware;

// Set view in Container
$container->set('view', function() {
    return Twig::create(__DIR__ . '../../resources/views', 
    ['cache' => getenv('VIEW_CACHE_DISABLED') ? __DIR__ . '/../../storage/views' : false]);
});

// Creat settings object
$settings = $container->get('settings');

// Add Twig-View Middleware
$app->add(TwigMiddleware::createFromContainer($app));


// Set the base path to run the app in a subdirectory.
// This path is used in urlFor().
$app->add(new BasePathMiddleware($app));