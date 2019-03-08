<?php

/*
|--------------------------------------------------------------------------
| Registered Container Service
|--------------------------------------------------------------------------
*/

$capsule = new \Illuminate\Database\Capsule\Manager();
$capsule->addConnection(config('db'));
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function () use (&$capsule) {
    return $capsule;
};

$container['view'] = new App\Services\ViewService;
$container['serializer'] = new App\Services\SerializerService;
$container['validator'] = new \App\Services\ValidatorService;
$container['logger'] = new App\Services\LoggerService;

/*
|--------------------------------------------------------------------------
| Registered Controller
|--------------------------------------------------------------------------
*/

$container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
};