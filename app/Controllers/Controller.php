<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use DI\Container;

abstract class Controller
{
    protected $request;
    protected $response;
    protected $args;

    /**
     * The container instance.
     *
     * @var \PSR\Container\ContainerInterface
     */
    protected $c;

    /**
     * Set up controllers to have access to the container.
     *
     * @param \PSR\Container\ContainerInterface $container
     */
    public function __construct(Container $container)
    {
        $this->c = $container;
    }

    // this one is optional - refer to Slim3 - Simplifying Routing At Scale
    // https://blog.programster.org/slim3-simplifying-routing-at-scale
    // abstract public static function registerRoutes($app);
}
