<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/env', function () {
   return app()->environment();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('pieces', ['uses' => 'Controller@showPieces']);
    $router->get('test', ['uses' => 'Controller@test']);
});