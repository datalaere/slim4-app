<?php

$container->set('settings', function () {
    return (object) [
        'displayErrorDetails' => getenv('APP_DEBUG')  ? getenv('APP_DEBUG') : false,

        'app' => (object) [
            'name' => getenv('APP_NAME') ? getenv('APP_NAME') : 'Slim4 App',
        ],

        'view' => (object) [
            'storage' => '',
            'cache' => false
        ],

        'db' => (object) [
            'driver' => getenv('DB_DRIVER') ? getenv('DB_DRIVER') : 'mysql',
            'host' => getenv('DB_HOST') ? getenv('DB_HOST') : '127.0.0.1',
            'username' => getenv('DB_USER') ? getenv('DB_USER') : 'root',
            'password' => getenv('DB_PASS') ? getenv('DB_PASS') : 'mysql',
            'name' => getenv('DB_NAME') ? getenv('DB_NAME') : 'app',
            'charset' => getenv('DB_CHARSET') ? getenv('DB_CHARSET') : 'utf8',
            'collation' => getenv('DB_COLLATION') ? getenv('DB_COLLATION') : 'utf8_unicode_ci',
            'prefix' => getenv('DB_PREFIX') ? getenv('DB_PREFIX')  : '',
        ]
    ];
});