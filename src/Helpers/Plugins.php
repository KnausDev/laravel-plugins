<?php

namespace KnausDev\LaravelPlugins\Helpers;

use Exception;

class Plugins
{
    public string $vendor;
    public string $packageName;

    /**
     * @throws Exception
     */
    public function __construct() {}

//    ------------------SETTERS------------------------

    public function setVendor(string $vendor): void
    {
        $this->vendor = $vendor;
    }

    public function setPackageName(string $packageName): void
    {
        $this->packageName = $packageName;
    }


//    ------------------GETTERS------------------------

    /**
     * @param bool $isComposer
     * @return string
     * @throws Exception
     */
    public function getNamespace(bool $isComposer = false): string
    {
        $namespace = '';

        if (config('laravel-plugins.vendor.is_active')) {
            if ($this->vendor == '') {
                $this->vendor = config('laravel-plugins.vendor.name');
                if ($this->vendor == '') {
                    throw new Exception('Vendor name is empty');
                }
            }

            $namespace = $this->vendor . ($isComposer ? '\\\\' : '\\');
        }

        $namespace .= $this->packageName . ($isComposer ? '\\\\' : '');
        return $namespace;
    }

    public function getVendor(): string
    {
        return $this->vendor;
    }

    public function getPackageName(): string
    {
        return $this->packageName;
    }

}
