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



