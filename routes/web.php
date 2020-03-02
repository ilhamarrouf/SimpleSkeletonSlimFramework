<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

$app->get('/', 'HomeController:index')->setName('home');

$app->get('/phpinfo', function ($request, $response) {
    phpinfo();
});
