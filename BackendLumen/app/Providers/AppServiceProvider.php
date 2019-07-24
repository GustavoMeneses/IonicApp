<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
          'App\Repositories\PessoaRepositoryInterface', 'App\Repositories\PessoaRepositoryEloquent'
        );
        $this->app->bind(
          'App\Repositories\PerfilRepositoryInterface', 'App\Repositories\PerfilRepositoryEloquent'
        );
        $this->app->bind(
          'App\Repositories\AplicativoRepositoryInterface', 'App\Repositories\AplicativoRepositoryEloquent'
        );
        $this->app->bind(
          'App\Repositories\UsuarioRepositoryInterface', 'App\Repositories\UsuarioRepositoryEloquent'
        );
        $this->app->bind(
          'App\Repositories\AcessoRepositoryInterface', 'App\Repositories\AcessoRepositoryEloquent'
        );
    }
}
