<?php

return [
    'settings' => [

        // Slim Configuration
        'displayErrorDetails'    => true,
        'addContentLengthHeader' => false,

        // View engine
        'view' => [
            'template_path' => __DIR__ . '/../views',
            'twig' => [
                'cache' => false
            ],
        ],
    ]
];