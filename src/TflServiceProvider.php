<?php

namespace Abulia\TflUnified;

use Abulia\TflUnified\ApiService;
use Illuminate\Support\ServiceProvider;

class TflServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/tfl.php' => config_path('tfl.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/tfl.php', 'tfl'
        );

        $this->app->singleton(ApiService::class, function ($app) {
            return new ApiService(config('tfl'), $app);
        });
    }
}
