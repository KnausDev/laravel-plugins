<?php

namespace KnausDev\LaravelPlugins;

use Illuminate\Support\ServiceProvider;
use KnausDev\LaravelPlugins\Console\Make\MakeModel;
use KnausDev\LaravelPlugins\Console\PluginsMake;
use KnausDev\LaravelPlugins\Helpers\FileHelper;
use KnausDev\LaravelPlugins\Helpers\LaravelStub;
use KnausDev\LaravelPlugins\Helpers\Plugins;
use KnausDev\LaravelPlugins\Helpers\StubHelper;


class LaravelPluginsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-plugins');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-plugins');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-plugins.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-plugins'),
            ], 'views');*/

            // Registering package commands.
//             $this->commands();
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {

        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-plugins');

        $this->app->bind('laravel-stub', fn ($app) => new LaravelStub);

        $this->app->singleton('Plugins', function () {
            return new Plugins;
        });

        $this->app->singleton('file-helper', fn ($app) => new FileHelper());
        $this->app->singleton('stub-helper', fn ($app) => new StubHelper());

        $this->registerCommands();
    }

    private function registerCommands()
    {
        $this->commands(
            [
                PluginsMake::class,
                MakeModel::class
            ]
        );
    }
}
