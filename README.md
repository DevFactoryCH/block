#Block

This package allows you to create block and choose the position of the block where you need it.

## Installation

Using Composer, edit your `composer.json` file to require `devfactory/block`.

    "require": {
      "devfactory/block": "2.0.*"
    }

Then from the terminal run

    composer update

Then in your `app/config/app.php` file register the following service providers:

    'Devfactory\Block\BlockServiceProvider',

And the Facade:

    'Block'      => 'Devfactory\Block\Facades\BlockFacade',

If you want you can publish the config files if you want to change them

    php artisan config:publish devfactory/block

```php
<?php

return array(

  /*
  |--------------------------------------------------------------------------
  | Block route prefix
  |--------------------------------------------------------------------------
  |
  | You can use this param to set the prefix before the routes
  |
  */
  'route_prefix' => 'admin',

  /*
  |--------------------------------------------------------------------------
  | Block filter before
  |--------------------------------------------------------------------------
  |
  | You can set the filter who will be used to display the page
  |
  */
  'filter_before' => 'admin-auth',

  /*
  |--------------------------------------------------------------------------
  | Block regions
  |--------------------------------------------------------------------------
  |
  | The default regions
  |
  */
  'regions' => array(
    'header' => 'Header',
    'sidebar_left' => 'Sidebar Left',
    'content' => 'Content',
    'sidebar_right' => 'Sidebar Right',
    'footer' => 'Footer',
  ),

);
```

Run the migration to create the DB table:

```
php artisan migrate --package=devfactory/block
```

Publish the assets
```
php artisan asset:publish devfactory/block
```

## Usage

You just need to setup somes regions in your configuration files, and after to use the facade in the blade

```php
{{ Block::region('header') }}
{{ Block::region('sidebar_left') }}
{{ Block::region('content') }}
{{ Block::region('sidebar_right') }}
{{ Block::region('footer') }}
```
