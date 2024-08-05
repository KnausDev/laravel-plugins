<?php

namespace KnausDev\LaravelPlugins\Console;


use Exception;
use KnausDev\LaravelPlugins\Facades\FileHelper;
use KnausDev\LaravelPlugins\Facades\Plugins;
use KnausDev\LaravelPlugins\Facades\StubHelper;

class PluginsMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugins:make {vendor.name : Vendor name and package name separated by dot - Vendor is optional if configured}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new plugin';

    /**
     * Execute the console command.
     *
     * @throws Exception
     */
    public function handle(): void
    {
        $this->checkForVendorAndResolvePackageName();
        FileHelper::createPluginDirectory();

        StubHelper::setReplaces($this->generateReplaces());
        StubHelper::createPluginStub();


        $this->info('Plugin created successfully!');
    }

    public function generateReplaces(): array
    {
        return [
            'MODULE' => Plugins::getPackageName(),
            'LOWER_NAME' => Plugins::getPackageName(),
            'NAMESPACE' => Plugins::getVendor() . '\\' . Plugins::getPackageName(),
            'CLASS' => Plugins::getPackageName() . 'ServiceProvider',
            'COMPOSER_NAMESPACE' => Plugins::getNamespace(true),
            'AUTHOR_NAME' => config('laravel-plugins.composer.author.name'),
            'AUTHOR_EMAIL' => config('laravel-plugins.composer.author.email'),
            'VENDOR' => Plugins::getVendor(),
            'PACKAGE_NAME' => Plugins::getPackageName(),
            'DIRECTORY_PATH' => FileHelper::getPluginDirectory(true) . '/',
            'PROVIDER' => '"' . FileHelper::getPluginDirectory(false, true) . '\\\\' . Plugins::getPackageName() . 'ServiceProvider"',
        ];
    }
}
