<?php
namespace Middlewares;

use Utils\Middleware;

/**
*  @author - Diefferson Santos
**/
class JsonOutputMiddleware extends Middleware
{ 
    public function __invoke($request,$response, $next)
    {
        $response = $next($request, $response);
        
        $response = $response->withHeader('Content-type', 'application/json');

        return $response;
    }
}