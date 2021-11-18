<?php 

namespace Devfactory\Block;

use Devfactory\Block\View\Composers\BlockComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class BlockServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/config.php';
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
        View::composer('*', BlockComposer::class);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'block');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'block');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/block'),
            ]);

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('block.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/block'),
            ], 'views');

            if (!class_exists('CreateBlocksTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_blocks_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_blocks_table.php'),
                ], 'migrations');
            }
        }
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
        return config_path('config.php');
    }
}
