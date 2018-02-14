<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;



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

        Carbon::setLocale(config('app.locale'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('path.public', function() {
            return base_path('public_html');
        });
    }
}
