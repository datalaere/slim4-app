<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\HomeController;

$app->get('/', HomeController::class . ':index')->setName('home');


// Define app routes
/*
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('Hello, World!');
    return $response;
})->setName('root');
*/

require_once  'crud.php';