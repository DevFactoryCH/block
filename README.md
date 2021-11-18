#Block

This package allows you to create block and choose the position of the block where you need it.

## Installation

Using Composer to install the package.

```bash
composer require devfactory/block
```

Then in your `app/config/app.php` file register the following service providers:
    Devfactory\Block\BlockServiceProvider::class,

```php
// config/app.php

'providers' => [
    ...
    Devfactory\Block\BlockServiceProvider::class,
],

'aliases' => [
    ...
    'Block' => Devfactory\Block\Facades\Block::class,
],
```

If you want you can publish the config, views and migration files if you want to change them

```bash
php artisan vendor:publish --provider="Devfactory\Block\BlockServiceProvider" --tag="config"
```

```bash
php artisan vendor:publish --provider="Devfactory\Block\BlockServiceProvider" --tag="views"
```

```bash
php artisan vendor:publish --provider="Devfactory\Block\BlockServiceProvider" --tag="migrations"
```

## Usage

You just need to create a block then you can call the block content with the block facade like this

```php
{{ Block::get('block_title') }}
```


