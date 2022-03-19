<?php

namespace Fligno\SimpleStatistics;

use Fligno\StarterKit\Providers\BaseStarterKitServiceProvider;

class SimpleStatisticsServiceProvider extends BaseStarterKitServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/simple-statistics.php', 'simple-statistics');

        // Register the service the package provides.
        $this->app->singleton('simple-statistics', function ($app) {
            return new SimpleStatistics;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['simple-statistics'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/simple-statistics.php' => config_path('simple-statistics.php'),
        ], 'simple-statistics.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/fligno'),
        ], 'simple-statistics.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/fligno'),
        ], 'simple-statistics.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/fligno'),
        ], 'simple-statistics.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
