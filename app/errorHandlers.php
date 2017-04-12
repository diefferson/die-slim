<?php

$container['errorHandler'] = function ($c) {

    return function ($request, $response, $exception) use ($c) {

        if( $c->settings['displayErrorDetails'] ) {

            $data = [
              'code' => $exception->getCode(),
              'message' => $exception->getMessage(),
              'content' => null,
              'file' => $exception->getFile(),
              'line' => $exception->getLine(),
              'trace' => explode("\n", $exception->getTraceAsString()),
            ];

        }else{

            $data = [
              'code' => $exception->getCode(),
              'message' => $exception->getMessage(),
              'content' => null,
            ];

        }

        $response = $c->get('response')
        			  ->withHeader('Content-Type', 'application/json')
        			  ->write(json_encode($data));

        if($exception instanceof Exception\ApiException ){
           	$response = $response->withStatus((INT)$exception->getStatusCode());
        }else{
        	$response = $response->withStatus(500);
        }

        return $response;
    };
};

$container['notFoundHandler'] = function ($c) {

    return function ($request, $response) use ($c) {

        $data = [
          'code' => '404',
          'message' => 'Page not found',
          'content' => null,
        ];

       return $c->get('response')
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode($data))
                ->withStatus(404);

    };
};

$container['notAllowedHandler'] = function ($c) {  

    return function ($request, $response, $methods) use ($c) {

        if( $c->settings['displayErrorDetails'] ) {

            $data = [
              'code' => '405',
              'message' => 'Method not allowed. Method must be one of: ' . implode(', ', $methods),
              'content' => null,
            ];

        }else{

            $data = [
              'code' => '405',
              'message' => 'Method not allowed',
              'content' => null,
            ];
        }

       return $c->get('response')
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode($data))
                ->withStatus(405);

    };
};