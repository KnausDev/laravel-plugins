<?php
namespace KnausDev\LaravelPlugins\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void createPluginStub()
 * @method static setReplaces(array $generateReplaces)
 *
 * @see \KnausDev\LaravelPlugins\Helpers\StubHelper
 */
class StubHelper extends Facade
{
    /**
     * Get facade accessor.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'stub-helper';
    }
}
