<?php

$container = $app->getContainer();

// Errors
$container['errorHandler'] = function ($c) {

    return function ($request, $response, $exception) use ($c) {

        if( $c->settings['displayErrorDetails'] ) {

            $data = [
              'code' => $exception->getCode(),
              'message' => $exception->getMessage(),
              'file' => $exception->getFile(),
              'line' => $exception->getLine(),
              'trace' => explode("\n", $exception->getTraceAsString()),
            ];

        }else{

            $data = [
              'code' => $exception->getCode(),
              'message' => $exception->getMessage(),
            ];

        }

        return $c->get('response')->withHeader('Content-Type', 'application/json')->write(json_encode($data));
    };
};

// Database
$container['pdo'] = function ($container) {

    $cfg = $container->get('settings')['db'];

    return new \Slim\PDO\Database($cfg['dsn'], $cfg['user'], $cfg['pass']);
};


// Twig
$container['view'] = function ( $c ) {

    $settings = $c->get('settings');
    $view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// Monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};