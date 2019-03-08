<?php

return [
    'settings' => [

        // Slim Configuration
        'displayErrorDetails' => true,

        // Database
        'db' => [
            'driver' => env('DB_CONNECTION', 'pgsql'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'my_app'),
            'username' => env('DB_USERNAME', 'postgres'),
            'password' => env('DB_PASSWORD', 'postgres'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],

        'view' => [
            'template_path' => __DIR__ . '/../resources/views',
            'twig' => [
                'cache' => STORAGE_PATH.'cache/views',
                'auto_reload' => true,
            ],
        ],

        'logger' => [
            'name' => 'app',
            'path' => STORAGE_PATH. 'logs/'.date('Y-m-d').'.log',
        ],
    ]
];