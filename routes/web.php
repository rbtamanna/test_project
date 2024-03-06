<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

//use App\Http\Controllers\Auth\UserController;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login', function () use ($router) {
    return 'inside login';
});
$router->post('/login', 'Auth\UserController@authenticate');
$router->get('/logout', [UserController::class, 'logout']);
