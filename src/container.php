<?php

$container = $app->getContainer();

/*
|--------------------------------------------------------------------------
| Registered Container Service
|--------------------------------------------------------------------------
*/

// View engine
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

/*
|--------------------------------------------------------------------------
| Registered Controller
|--------------------------------------------------------------------------
*/

$container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
};