<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Motivo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::share('categorias', Categoria::all());
        View::share('motivos', Motivo::all());
    }
}
