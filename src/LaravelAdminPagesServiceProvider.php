<?php

declare(strict_types=1);

namespace GarbuzIvan\LaravelAdminPages;

use Illuminate\Support\ServiceProvider;

class LaravelAdminPagesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services...
     *
     * @return void
     */
    public function boot()
    {
        $configPath = $this->configPath();
        $this->publishes([
            $configPath . '/laravel-admin-pages.php' => $this->publishPath('laravel-admin-pages.php'),
        ], 'config');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'gi_la_pages');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'gi_la_pages');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * @return string
     */
    protected function configPath(): string
    {
        return __DIR__ . '/../config';
    }

    /**
     * @param $configFile
     * @return string
     */
    protected function publishPath($configFile): string
    {
        if (function_exists('config_path')) {
            return config_path($configFile);
        } else {
            return base_path('config/' . $configFile);
        }
    }
}
