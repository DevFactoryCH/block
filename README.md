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

Run the migration to create the DB table:

    php artisan migrate --package=devfactory/block

## Usage

Then to save a media, in the method that handles your form submission you just need to pass the File object to `saveMedia()`:

```php
public function upload() {
  $user = User::firstOrCreate(['id' => 1]);

  if (Input::hasFile('image')) {
    $user->saveMedia(Input::file('image'));
  }

  return Redirect::route('route');
}
```


