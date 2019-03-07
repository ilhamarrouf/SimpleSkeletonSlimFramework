<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

$app->get('', function(Request $request, Response $response) {
    return $response->withJson([
        'message' => 'Hello '.$request->getParam('name', 'World')
    ], StatusCode::HTTP_OK);
});

$app->group('/examples', function () use ($app) {
    $app->get('', 'App\Controllers\Api\ExampleController:index');
    $app->post('', 'App\Controllers\Api\ExampleController:store');
    $app->get('/{example}', 'App\Controllers\Api\ExampleController:show');
    $app->map(['PATCH', 'PUT'], '/{example}', 'App\Controllers\Api\ExampleController:update');
    $app->delete('/{example}', 'App\Controllers\Api\ExampleController:destroy');
});