<?php

return [
    'settings' => [

        // Slim Configuration
        'displayErrorDetails' => true,

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