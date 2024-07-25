<?php

namespace KnausDev\LaravelPlugins\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static static from(string $path)
 * @method static static to(string $to)
 * @method static static name(string $name)
 * @method static static ext(string $ext)
 * @method static static replace(string $key, mixed $value)
 * @method static static replaces(array $replaces)
 * @method static mixed download()
 * @method static bool generate()
 *
 * @see \KnausDev\LaravelPlugins\Helpers\LaravelStub
 */
class LaravelStub extends Facade
{
    /**
     * Get facade accessor.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-stub';
    }
}
