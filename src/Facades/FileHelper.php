<?php
namespace KnausDev\LaravelPlugins\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string getPluginDirectory(bool $isRelative = false, bool $isComposer = false)
 * @method static string getPluginSaveDirectory(string $type = '')
 * @method static void createPluginDirectory()
 *
 * @see \KnausDev\LaravelPlugins\Helpers\FileHelper
 */
class FileHelper extends Facade
{
    /**
     * Get facade accessor.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'file-helper';
    }
}
