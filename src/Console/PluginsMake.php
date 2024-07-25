<?php

namespace KnausDev\LaravelPlugins\Console;


use Exception;
use Illuminate\Support\Str;
use KnausDev\LaravelPlugins\Helpers\FileHelper;
use KnausDev\LaravelPlugins\Helpers\StubHelper;

class PluginsMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugins:make {vendor.name}';

    public FileHelper $fileHelper;

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
        $this->pluginName = Str::of($this->argument('vendor.name'));

        $this->checkForVendor();

        $this->resolvePackageName();

        $this->fileHelper = new FileHelper($this->vendor, $this->packageName);
        $this->fileHelper->createPluginDirectory();


        // Create plugin structure from stub
        $stubHelper = new StubHelper($this->fileHelper);
        $stubHelper->createPluginStub();


        $this->info('Plugin created successfully!');
    }
}
