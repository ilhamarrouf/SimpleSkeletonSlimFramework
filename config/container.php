<?php

/*
|--------------------------------------------------------------------------
| Registered Container Service
|--------------------------------------------------------------------------
*/

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection(config('db'));
$capsule->setAsGlobal();
$capsule->bootEloquent();

/**
 * @return \Illuminate\Database\Capsule\Manager
 */
$container['db'] = function () use (&$capsule) {
    return $capsule;
};

/**
 * @return \Slim\Views\Twig
 */
$container['view'] = function () {
    $view = new \Slim\Views\Twig(
        config('view.template_path'),
        config('view.twig')
    );
    $view->addExtension(new \Slim\Views\TwigExtension(
        container()->get('router'),
        container()->get('request')->getUri()
    ));

    return $view;
};

/**
 * @return \League\Fractal\Manager
 */
$container['serializer'] = function () {
    $serializer = new \League\Fractal\Manager;
    $serializer->setSerializer(new \App\Serializers\CustomSerializer);
    $serializer->parseIncludes(request('include', []));
    $serializer->parseExcludes(request('excludes', []));

    return $serializer;
};

/**
 * @return \GuzzleHttp\Client
 */
$container['guzzle'] = function () {
    return new \GuzzleHttp\Client(config('guzzle'));
};

/**
 * @return \App\Validations\Validator
 */
$container['validator'] = function () {
    return new \App\Validations\Validator;
};

/**
 * @return \Monolog\Logger
 */
$container['logger'] = function () {
    $logger = new \Monolog\Logger(config('logger.name'));
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());

    try {
        $logger->pushHandler(
            new \Monolog\Handler\StreamHandler(config('logger.path'),
                \Monolog\Logger::DEBUG)
        );
    } catch (\Exception $exception) {

    }

    return $logger;
};

/**
 * @param $container
 *
 * @return \Ilhamarrouf\Filesystem\FilesystemManager
 */
$container['storage'] = function ($container) {
    return new \Ilhamarrouf\Filesystem\FilesystemManager($container);
};

/**
 * @param $container
 *
 * @return \Anddye\Mailer\Mailer
 */
$container['mailer'] = function ($container) {
    return new \Anddye\Mailer\Mailer($container['view'], config('mailer'));
};

/*
|--------------------------------------------------------------------------
| Registered Controller
|--------------------------------------------------------------------------
*/

$container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
};