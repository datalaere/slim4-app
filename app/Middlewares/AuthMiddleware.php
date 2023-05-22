<?php

namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\Auth;

class AuthMiddleware implements \Psr\Http\Server\MiddlewareInterface
{
    public function process(Request $request, Handler $handler): Response
    {
        $uri = $_SERVER['REQUEST_URI'];

        if (str_starts_with($uri, "/admin/") && Auth::isAdmin() === false)
        {
            $response = new \Slim\Psr7\Response(302);
            $response = $response->withHeader('Location', '/login');
        }
        else
        {
            $response = $handler->handle($request);
        }

        return $response;
    }
}