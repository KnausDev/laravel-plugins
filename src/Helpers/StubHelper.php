<?php

namespace KnausDev\LaravelPlugins\Helpers;

use Illuminate\Support\Facades\File;

class StubHelper
{

    public string $type;
    public FileHelper $fileHelper;

    public function __construct(FileHelper $fileHelper)
    {
        $this->fileHelper = $fileHelper;
    }

    public function loadStubs()
    {
        // TODO: Load stubs by make command
        // TODO: Load stubs by type
        // TODO: Load stubs for create command



        return file_get_contents(__DIR__ . '/../stubs/scaffold/provider.stub');
    }

    public function createPluginStub()
    {
        // Add service provider to vendor/packageName/{packageName}SerivceProvider.php

        \KnausDev\LaravelPlugins\Facades\LaravelStub::from(__DIR__ . '/../stubs/scaffold/provider.stub')->to($this->fileHelper->getPluginSaveDirectory())->name('test')->ext('php')->generate();
        dd($this->loadStubs());
    }
}
