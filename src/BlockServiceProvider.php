<?php 

namespace Devfactory\Block;

use Illuminate\Support\ServiceProvider;

class BlockServiceProvider extends ServiceProvider {

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;
  
  public function boot()
  {
    $this->package('devfactory/block', 'block', __DIR__);
    include __DIR__ . '/routes.php';
  }
  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app['block'] = $this->app->share(function($app) {
        return new Block;
    });
  }
  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return array('block');
  }
}