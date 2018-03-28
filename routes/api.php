<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

$app->get('', function($request, $response, $args) {
    return $response->withJson(['message' => 'Hello World']);
});