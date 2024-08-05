<?php

namespace KnausDev\LaravelPlugins\Helpers;

use Exception;
use Illuminate\Support\Facades\File;
use KnausDev\LaravelPlugins\Facades\Plugins;

class FileHelper
{
    public string $vendor;
    public string $packageName;

    public function __construct() {}

    public function getPluginsDirectory(): string {
        return base_path(config('laravel-plugins.directory'));
    }

    /**
     * @throws Exception
     */
    public function getPluginDirectory(bool $isRelative = false, bool $isComposer = false): string {
        $path = '';

        if (config('laravel-plugins.vendor.is_active')) {
            if (Plugins::getVendor() == '') {
                Plugins::setVendor(config('laravel-plugins.vendor.name'));
                if (Plugins::getVendor() == '') {
                    throw new Exception('Vendor name is empty');
                }
            }
            $path = Plugins::getVendor() . '/';
        }

        $path .= Plugins::getPackageName();
        if ($isComposer) {
            return str_replace('/', '\\\\', $path);
        }
        if ($isRelative) {
            return config('laravel-plugins.directory') . '/' . $path;
        }
        return $this->getPluginsDirectory() . '/' . $path;
    }

    /**
     * Returns string if directory exists, if not creates directory and then returns path
     *
     * @throws Exception
     */
    public function getPluginSaveDirectory(string $type = ''): string {
        if (!File::isDirectory($this->getPluginDirectory() . '/' . config("laravel-plugins.paths.generator.$type.path"))) {
            File::makeDirectory($this->getPluginDirectory() . '/' . config("laravel-plugins.paths.generator.$type.path"), 0755, true);
        }

        if ($type) {
            return $this->getPluginDirectory() . '/' . config("laravel-plugins.paths.generator.$type.path");
        }

        return $this->getPluginDirectory();
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
