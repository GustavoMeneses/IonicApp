<?php

use App\Models\Pessoas;

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

$router->get('/api/perfis', 'PerfisController@getAll');

$router->group(['prefix' => '/api/perfil'], function() use ($router){
  $router->get('/{id}', 'PerfisController@get');
  $router->post('/', 'PerfisController@store');
  $router->put('/{id}', 'PerfisController@update');
  $router->delete('/{id}', 'PerfisController@destroy');
});

$router->get('/api/aplicativos', 'AplicativosController@getAll');

$router->group(['prefix' => '/api/aplicativo'], function() use ($router){
  $router->get('/{id}', 'AplicativosController@get');
  $router->post('/', 'AplicativosController@store');
  $router->put('/{id}', 'AplicativosController@update');
  $router->delete('/{id}', 'AplicativosController@destroy');
});

$router->get('/api/usuarios', 'UsuariosController@getAll');

$router->group(['prefix' => '/api/usuario'], function() use ($router){
  $router->get('/{id}', 'UsuariosController@get');
  $router->post('/', 'UsuariosController@store');
  $router->put('/{id}', 'UsuariosController@update');
  $router->delete('/{id}', 'UsuariosController@destroy');
});

$router->get('/api/acessos', 'AcessosController@getAll');

$router->group(['prefix' => '/api/acesso'], function() use ($router){
  $router->get('/{id}', 'AcessosController@get');
  $router->post('/', 'AcessosController@store');
  $router->put('/{id}', 'AcessosController@update');
  $router->delete('/{id}', 'AcessosController@destroy');
});

$router->get('/', function () use ($router) {
    $pessoa = Pessoas::find(3);

    if($pessoa->delete())
    {
      return 'deletado';
    } else {
      return 'deu ruim';
    }
});
