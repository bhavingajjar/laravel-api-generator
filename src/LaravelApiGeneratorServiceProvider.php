<?php

namespace Bhavingajjar\LaravelApiGenerator;

use Bhavingajjar\LaravelApiGenerator\Commands\GenerateApi;
use Illuminate\Support\ServiceProvider;

class LaravelApiGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-api-generator');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-api-generator');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-api-generator.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-api-generator'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-api-generator'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-api-generator'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                GenerateApi::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-api-generator');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-api-generator', function () {
            return new LaravelApiGenerator;
        });
    }
}
