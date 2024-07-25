<?php

namespace KnausDev\LaravelPlugins\Helpers;

use Exception;
use Illuminate\Support\Facades\File;

class FileHelper
{
    public string $vendor;
    public string $packageName;
    public string $pluginDirectory;

    public function __construct(string $vendor, string $packageName) {
        $this->vendor = $vendor;
        $this->packageName = $packageName;
        $this->pluginDirectory = $this->vendor.'/'.$this->packageName;
    }

    public function getPluginsDirectory(): string {
        return base_path(config('laravel-plugins.directory'));
    }

    /**
     * @throws Exception
     */
    public function getPluginDirectory(): string {
        $path = '';

        if (config('laravel-plugins.vendor.is_active')) {
            if ($this->vendor == '') {
                $this->vendor = config('laravel-plugins.vendor.name');
                if ($this->vendor == '') {
                    throw new \Exception('Vendor name is empty');
                }
            }
            $path = $this->vendor . '/';
        }

        $path .= $this->packageName;
        return $this->getPluginsDirectory() . '/' . $path;
    }

    /**
     * Returns string if directory exists, if not creates directory and then returns path
     *
     * @throws Exception
     */
    public function getPluginSaveDirectory(string $type): string {
        if (!File::isDirectory($this->getPluginDirectory() . '/' . config("laravel-plugins.paths.generator.{$type}.path"))) {
            File::makeDirectory($this->getPluginDirectory() . '/' . config("laravel-plugins.paths.generator.{$type}.path"), 0755, true);
        }

        return $this->getPluginDirectory() . '/' . config("laravel-plugins.paths.generator.{$type}.path");
    }



    // --------------------CREATE FUNCTIONS------------------------

    /**
     * @throws Exception
     */
    public function createPluginDirectory()
    {
        if (!File::isDirectory($this->getPluginDirectory())) {
            File::makeDirectory($this->getPluginDirectory(), 0755, true);
        }
    }
}
