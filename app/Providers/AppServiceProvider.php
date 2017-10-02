<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::resourceVerbs([
            'create' => 'crear',
            'edit'   => 'editar',
            'delete' => 'eliminar',
            'show'   => 'ver'
        ]);

        Validator::extend('not_only_caps', function($attribute, $value, $parameters, $validator) {
            return $value !== mb_strtoupper($value);
        });

        Validator::extend('not_only_lowercase', function($attribute, $value, $parameters, $validator) {
            return $value !== mb_strtolower($value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
