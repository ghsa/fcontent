<?php

namespace FContent\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use FContent\FContent;

class FContentServiceProvider extends ServiceProvider {

    public function boot()
    {
        Route::namespace("FContent\Controllers")
            ->group(__DIR__."/../Routes/web.php");

        $this->loadViewsFrom(__DIR__.'/../Views', 'fcontent');
        
        $this->loadMigrationsFrom(__DIR__.'/../Migrations');

        $this->mergeConfigFrom(__DIR__.'/../config/fcontent.php', 'fcontent');

        $this->publishes([
            __DIR__."/../Views" => resource_path("views/vendor/fcontent")
        ], 'views');

        $this->publishes([
            __DIR__.'/../config/fcontent.php' => config_path('fcontent.php')
        ], 'config');

    }

    public function register()
    {
        $this->app->singleton('FContent.fcontent', function($app) {
            return new FContent();
        });
    }

}
