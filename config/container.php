<?php

/*
|--------------------------------------------------------------------------
| Registered Container Service
|--------------------------------------------------------------------------
*/

// Twig
$container['view'] = function ($container) {
    $settings = $container->get('settings')['view'];

    $view = new Slim\Views\Twig(
        $settings['template_path'],
        $settings['twig']
    );
    $view->addExtension(new Slim\Views\TwigExtension(
        $container->get('router'),
        $container->get('request')->getUri())
    );

    return $view;
};

// Monolog
$container['logger'] = function ($container) {
    $settings = $container->get('settings')['logger'];

    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));

    return $logger;
};

/*
|--------------------------------------------------------------------------
| Registered Controller
|--------------------------------------------------------------------------
*/

$container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
};