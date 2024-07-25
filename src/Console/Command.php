<?php

namespace KnausDev\LaravelPlugins\Console;


use Exception;
use Illuminate\Support\Stringable;

class Command extends \Illuminate\Console\Command
{
    public Stringable $pluginName;
    public string $vendor;
    public string $packageName;


    /**
     * Check if the vendor name is valid
     *
     * @return void
     * @throws Exception
     */
    public function checkForVendor(): void {
        if (config('laravel-plugins.vendor.is_active') && config('laravel-plugins.vendor.name')) {
            return;
        }
        if (!$this->pluginName->contains('.') && config('laravel-plugins.vendor.is_active')) {
            Throw new Exception('Plugin should contain "." in the name and be in the format {vendor}.{name}');
        }
    }

    public function resolvePackageName(): void
    {
        $this->vendor = config('laravel-plugins.vendor.name');
        $this->packageName = $this->pluginName;
        if (config('laravel-plugins.vendor.is_active')) {
            if ($this->pluginName->contains('.')) {
                list($this->vendor, $this->packageName) = $this->pluginName->explode('.');
            }
        }
    }
}
