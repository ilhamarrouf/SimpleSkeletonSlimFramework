<?php

require __DIR__ . './../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__.'/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

$settings = require __DIR__ . './../config/settings.php';

/*
|--------------------------------------------------------------------------
| Load the local config to Application
|--------------------------------------------------------------------------
*/

foreach ($settings['settings']['php_ini'] as $iniKey => $iniValue) {
    ini_set($iniKey, $iniValue);
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
*/

$app = new Slim\App($settings);

/*
|--------------------------------------------------------------------------
| Initialization and Load Container Services
|--------------------------------------------------------------------------
*/

$container = $app->getContainer();

require __DIR__ . './../config/container.php';

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
*/

$app->group('', function () use ($app) {
    require __DIR__ . './../routes/web.php';
});

$app->group('/api', function () use ($app) {
    require __DIR__ . './../routes/api.php';
});

/*
|--------------------------------------------------------------------------
| Load The Application Middleware
|--------------------------------------------------------------------------
*/

$app->add(new \App\Middlewares\CORSMiddleware($container));

/*
|--------------------------------------------------------------------------
| Load The Application Dependency
|--------------------------------------------------------------------------
*/

\Respect\Validation\Validator::with('\App\Validations\Rules');

