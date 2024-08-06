# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/knausdev/laravel-plugins.svg?style=flat-square)](https://packagist.org/packages/knausdev/laravel-plugins)
[![Total Downloads](https://img.shields.io/packagist/dt/knausdev/laravel-plugins.svg?style=flat-square)](https://packagist.org/packages/knausdev/laravel-plugins)

## Introduction

---
Package inspired from OctoberCMS to create plugins like structure for your application.  Plugins helps to divide your architecture into more scalable and re-usable components. The idea is to be able determine on which purpose you’re using your models, controllers etc. Within laravel-plugins you can customize where will be all files stored, if you want to use {vendor} namespace or if you want to use default one.

This package was created because of lack of management in modules/plugins packages. In our company we often want to divide logical parts into larger logical groups. For example in one of our platform we have multiple user’s perspectives which results with messy code and because of this we need to divide client, user and group data with other packages for plugins/modules you can have multiple file architectures one of them can be like

Some of our developers wants to use their packages or their work, because of the general structure the namespace is always messy and lot of work needs to be done to shift their work to our code base. With laravel-plugins you can simply have folder with your own namespace and all your modules will work just fine (if built on top of plugins) `KnausDev/warehouse`
## Installation

You can install the package via composer:

```bash
composer require knausdev/laravel-plugins
```

Autoloading

Add to you `composer.json` :

Be aware of changing `directory` in your config file and mirror this changes also here
```json
    "extra": {
        "laravel": {
            "dont-discover": []
        },
        "merge-plugin": {
            "include": [
                "Plugins/*/composer.json",
                "Plugins/*/*/composer.json"
            ]
        }
    }
```

## Usage
## Usage

---

In this package you can find structure like {vendor}/{packageName}.

```bash
php artisan plugins:make {?vendor}.{packageName}
```

Usage: `php artisan plugins:make KnausDev.Warehouse`

Result:

```
/ <-- Your laravel root
	/plugins <-- Directory configurable in laravel-plugins config file
		/KnausDev <-- Vendor
			/Warehouse <-- Package name
				WarehouseServiceProvider.php
```


---
TODO: REST OF THE README 
---

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email peter@knaus-development.com instead of using the issue tracker.

## Credits

-   [Peter Knaus](https://github.com/knausdev)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

