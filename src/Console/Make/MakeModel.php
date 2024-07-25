<?php

namespace KnausDev\LaravelPlugins\Console\Make;


use Exception;
use Illuminate\Support\Str;
use KnausDev\LaravelPlugins\Console\Command;

class MakeModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugins:make-model {vendor.name} {modelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new plugin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @throws Exception
     */
    public function handle(): void
    {
        dd($this->argument('vendor.name'), $this->argument('modelName'));
        $this->pluginName = Str::of($this->argument('vendor.name'));

        $pluginsDirectory = $this->laravel->basePath(config('laravel-plugins.directory'));


        $this->checkForVendor();

        // Get the vendor and package name
        list($vendor, $packageName) = $this->pluginName->explode('.');

        // Create the plugin directory
        $pluginDirectory = $pluginsDirectory.'/'.$vendor.'/'.$packageName;
        if (!$this->laravel['files']->isDirectory($pluginDirectory)) {
            $this->laravel['files']->makeDirectory($pluginDirectory, 0755, true);
        }

        // Create plugin structure from stub


        $this->info('Plugin created successfully!');
    }
}
