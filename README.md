#Block

This package allows you to create block and place predefined presets, and store them in your Laravel public folder to serve them up without generating them on each page load.

## Installation

Using Composer, edit your `composer.json` file to require `devfactory/imagecache`.

  "require": {
    "devfactory/block": "dev-master"
  }

Then from the terminal run

    composer update

Then in your `app/config/app.php` file register the following service providers:

    'Devfactory\Block\BlockServiceProvider',

And the Facade:

    'Block'      => 'Devfactory\Block\Facades\ImagecacheFacade',

Publish the config:

    php artisan config:publish devfactory/block


