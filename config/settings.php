<?php

return [
    'settings' => [

        // Slim Configuration
        'displayErrorDetails' => true,

        // Twig
        'view' => [
            'template_path' => __DIR__ . '/../views',
            'twig' => [
                'cache' => __DIR__ . '/../storage/cache/views',
                'auto_reload' => true,
            ],
        ],

        // Monolog
        'logger' => [
            'name' => 'app',
            'path' => __DIR__ . '/../storage/logs/'.date('Y-m-d').'.log',
        ],
    ]
];