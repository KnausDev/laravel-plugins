<?php

namespace KnausDev\LaravelPlugins\providers;
;
use Illuminate\Support\ServiceProvider;
use KnausDev\LaravelPlugins\Helpers\LaravelStub;

class LaravelStubServiceProvider extends ServiceProvider
{
    /**
     * Boot providers.
     */
    public function boot(): void
    {
        $this->app->bind('laravel-stub', fn ($app) => new LaravelStub);
    }
}
