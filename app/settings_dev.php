<?php
return [

    'settings' => [

        'displayErrorDetails' => true,

        'view' => [
            'template_path' => __DIR__ . '/templates',
            'twig' => [
                'cache' => __DIR__ . '/../cache/twig',
                'debug' => false,
                'auto_reload' => true,
            ],
        ],

        // monolog settings
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/../log/app.log',
        ],   

        // db desenv settings
        'db'=>[
            'dsn' => 'mysql:host=myhost;dbname=mydbname;charset=utf8',
            'host'   => "myhost",
            'user'   => "myuser",
            'pass'   => "mypass",
            'dbname' => "mydbname"
        ],    
    ],
];