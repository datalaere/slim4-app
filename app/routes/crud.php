<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

use App\Controllers\UserController;


$app->group('/user', function (RouteCollectorProxy $group) {

    $group->post('/create', UserController::class . ':create')->setName('user.create');

    $group->get('/read', UserController::class . ':read')->setName('user.read');

});