<?php

$container->set('settings', function () {
    return [
        'displayErrorDetails' => getenv('APP_DEBUG')  ? getenv('APP_DEBUG') : false,

        'app' => [
            'name' => getenv('APP_NAME') ? getenv('APP_NAME') : 'Slim4 App',
        ],

        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'database',
            'username' => 'user',
            'password' => 'password',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ];
});