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

//-------------------CONFIGURAÇÃO DE ROTAS-------------------------

$router->get('/api/pessoas', 'PessoasController@getAll');

$router->group(['prefix' => '/api/pessoa'], function() use ($router){
  $router->get('/{id}', 'PessoasController@get');
  $router->post('/', 'PessoasController@store');
  $router->put('/{id}', 'PessoasController@update');
  $router->delete('/{id}', 'PessoasController@destroy');
});

/*
$router->get('/', function () use ($router) {
    //return $router->app->version();
    return 'teste';
});
*/
