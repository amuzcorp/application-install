<?php

namespace AmuzThemes\ApplicationInstall;

use AmuzThemes\ApplicationInstall\Nova\Resources\AppRelease;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ApplicationInstallThemeProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadJsonTranslationsFrom(__DIR__."/../resources/lang");
        $this->mergeConfigFrom(__DIR__.'/config/application-install.php','application-install');
        $this->app->booted(function () {
            $this->routes();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/config/application-install.php' => config_path('application-install.php')
        ], 'application-install-config');

        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'application-install-migrations');

        $this->loadMigrationsFrom(__DIR__ .'/database/migrations');

        Nova::serving(function (ServingNova $event) {
            Nova::resources([
                AppRelease::class
            ]);
        });
    }

    public function routes(): void
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['theme:application-install', 'web'])
            ->group(__DIR__.'/routes/web.php');


        Route::middleware(['api'])
            ->prefix('api/application-install')
            ->group(__DIR__.'/routes/api.php');
    }
}
