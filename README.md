#Block

This package allows you to create block and choose the position of the block where you need it.

## Installation

Using Composer, edit your `composer.json` file to require `devfactory/block`.

    "require": {
      "devfactory/block": "dev-master"
    }

Then from the terminal run

    composer update

Then in your `app/config/app.php` file register the following service providers:

    'Devfactory\Block\BlockServiceProvider',

And the Facade:

    'Block'      => 'Devfactory\Block\Facades\BlockFacade',

If you want you can publish the config files if you want to change them

    php artisan config:publish devfactory/taxonomy

Run the migration to create the DB table:

    php artisan migrate --package=devfactory/block

## Usage

You just need to create a block then you can call the block content with the block facade like this

```php
{{ Block::get('block_title') }}
```


