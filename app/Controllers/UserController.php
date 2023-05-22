<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\User;

class UserController extends Controller
{

    public function create(Request $request, Response $response, $args)
    {
        $post = $request->getParsedBody();

        $status =  User::create([
            'username' => $post['username'],
            'password' => $post['password'],
            'email' => $post['email']
        ]);

        return $response->redirect($app->urlFor('root'), 303);
    }

    public function read(Request $request, Response $response, $args)
    {
        return $this->c->get('view')->render($response, 'user/read.twig', [
            'status' => User::all(),
        ]);
    }

    public static function registerRoutes($app)
    {

    }

}
