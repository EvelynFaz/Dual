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

//$router->get('/', function () use ($router) {
  //  return $router->app->version();
//});


$router->get('/prueba', ['uses' => 'UserController@prueba']);
/* Rutas para las tutores*/
$router->group(['middleware' => ['auth']], function () use ($router) {
    $router->get('/turor/Student', ['uses' => 'TutorController@getAllStudent']);
    $router->delete('/turor/Student', ['uses' => 'TutorController@deleteStudent']);
    $router->put('/turor/Student', ['uses' => 'TutorController@updateStudent']);

/*Rutas */




});