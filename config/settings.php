<?php

return [
    'settings' => [

        // Slim Configuration
        'displayErrorDetails' => true,

        // Storage
        'filesystem' => [
            'default' => env('FILESYSTEM_DRIVER', 'local'),
            'cloud' => env('FILESYSTEM_CLOUD', 's3'),
            'disks' => [
                'public' => [
                    'driver' => 'local',
                    'root' => storage_path('app/public'),
                ],
                's3' => [
                    'driver' => 's3',
                    'key' => env('AWS_ACCESS_KEY_ID'),
                    'secret' => env('AWS_SECRET_ACCESS_KEY'),
                    'region' => env('AWS_DEFAULT_REGION'),
                    'bucket' => env('AWS_BUCKET'),
                    'url' => env('AWS_URL'),
                ],
                'minio' => [
                    'driver' => 's3',
                    'endpoint' => env('MINIO_ENDPOINT'),
                    'use_path_style_endpoint' => true,
                    'key' => env('AWS_KEY'),
                    'secret' => env('AWS_SECRET'),
                    'region' => env('AWS_REGION'),
                    'bucket' => env('AWS_BUCKET'),
                ],
            ],
        ],

        // Mailer
        'mailer' => [
            'host' => env('MAIL_HOST'),
            'port' => env('MAIL_PORT'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'protocol' => env('MAIL_ENCRYPTION'),
            'from' => [
                'address' => env('MAIL_FROM_ADDRESS'),
                'name' => env('MAIL_FROM_NAME'),
            ],
        ],

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
                'cache' => storage_path('cache/views'),
                'auto_reload' => true,
            ],
        ],

        'logger' => [
            'name' => env('APP_ENV', 'debug'),
            'path' => storage_path('logs/'.date('Y-m-d').'.log'),
        ],

        'php_ini' => [
            'date.timezone' => env('APP_TIMEZONE', 'UTC'),
        ],
    ]
];