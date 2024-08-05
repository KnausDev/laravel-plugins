<?php
namespace KnausDev\LaravelPlugins\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string getNamespace(bool $isComposer = false)
 * @method static void setVendor(string $vendor)
 * @method static void setPackageName(string $packageName)
 * @method static string getVendor()
 * @method static string getPackageName()
 *
 * @see \KnausDev\LaravelPlugins\Helpers\Plugins
 */
class Plugins extends Facade
{
    /**
     * Get facade accessor.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'Plugins';
    }
}
