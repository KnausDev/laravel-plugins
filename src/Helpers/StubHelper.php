<?php

namespace KnausDev\LaravelPlugins\Helpers;

use Exception;
use KnausDev\LaravelPlugins\Facades\LaravelStub;
use KnausDev\LaravelPlugins\Facades\Plugins;
use KnausDev\LaravelPlugins\Facades\FileHelper;

class StubHelper
{

    public string $type;
    public array $replaces;

    /**
     * @throws Exception
     */
    public function __construct() {}

    public function loadStubs()
    {
        // TODO: Load stubs by make command
        // TODO: Load stubs by type
        // TODO: Load stubs for create command



        return file_get_contents(__DIR__ . '/../stubs/scaffold/provider.stub');
    }

    public function setReplaces(array $replaces): void
    {
        $this->replaces = $replaces;
    }

    public function getReplaces(): array
    {
        return $this->replaces;
    }

    /**
     * @throws Exception
     */
    public function createPluginStub(): void
    {
        LaravelStub::from(__DIR__ . '/../stubs/scaffold/provider.stub')
            ->to(
                FileHelper::getPluginSaveDirectory('provider')
            )->name(Plugins::getPackageName() . 'ServiceProvider')
            ->ext('php')
            ->replaces(self::getReplaces())
            ->generate();

        LaravelStub::from(__DIR__ . '/../stubs/composer.stub')
            ->to(
                FileHelper::getPluginSaveDirectory()
            )->name('composer')
            ->ext('json')
            ->replaces(self::getReplaces())
            ->generate();
    }
}
