<?php

return [
    'settings' => [

        // Showing errors
        'displayErrorDetails' => true,

        // Add a Content-Length header to the response
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