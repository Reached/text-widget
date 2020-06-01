<?php

namespace Reached\TextWidget;

use Illuminate\Support\ServiceProvider;
use Reached\TextWidget\View\Components\Editor;
use Reached\TextWidget\View\Components\TextWidget;

class TextWidgetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'text-widget');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'cms');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewComponentsAs('cms', [
            TextWidget::class,
            Editor::class
        ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'cms');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/config/text-widget.php' => config_path('text-widget.php'),
        ]);
    }
}
