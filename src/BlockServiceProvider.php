<?php 

namespace Devfactory\Block;

use Illuminate\Support\ServiceProvider;

class BlockServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/block.php';
        $this->mergeConfigFrom($configPath, 'block');

        $this->app->bind('block', function($app) {
            return new Block();
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'block');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/block'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'block');

        $this->loadRoutesFrom(realpath(__DIR__ . '/routes.php'));
    }

    /**
     * Get the active router.
     *
     * @return Router
     */
    protected function getRouter()
    {
        return $this->app['router'];
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return config_path('block.php');
    }

    /**
     * Publish the config file
     *
     * @param  string $configPath
     */
    protected function publishConfig($configPath)
    {
        $this->publishes([$configPath => config_path('block.php')], 'config');
    }
}
