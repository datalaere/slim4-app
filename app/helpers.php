<?php

/**
 * Create a redirect response;
 * @param string $newLocation - where you wish to redirect the user.
 * @param Slim\Psr7\Response $response - the existing response to work with
 * @param bool $useTemporaryRedirect - whether this redirect is temporary, or browser should cache it.
 * @return Slim\Psr7\Response - the redirect response.
 */
function redirect(
    string $newLocation, 
    bool $useTemporaryRedirect=true
) : Slim\Psr7\Response
{
    $httpCode = ($useTemporaryRedirect) ? 302 : 301;
    $response = new \Slim\Psr7\Response($httpCode);
    $response = $response->withHeader('Location', $newLocation);
    return $response;
}