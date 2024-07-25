<?php

namespace KnausDev\LaravelPlugins;

use Illuminate\Support\Facades\Facade;

/**
 * @see \KnausDev\LaravelPlugins\Skeleton\SkeletonClass
 */
class LaravelPluginsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-plugins';
    }
}
