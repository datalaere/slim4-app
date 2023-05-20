<?php

namespace App\Controllers;

use DI\Container;

abstract class Controller
{
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
}
