<?php

namespace Blog\Blog;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;
use Illuminate\Support\Facades\Route;

class ServiceProvider extends SupportServiceProvider
{
    /**
     * Root path of package
     *
     * @var string
     */
    private $rootPath;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->rootPath = realpath(__DIR__ . '/../');
    }

    public function boot()
    {
        $this->loadRoutes();

        if (app()->runningInConsole()) {
            $this->loadConsoleResources();
        }
    }

    /**
     * Register the package routes.
     */
    private function loadRoutes(): void
    {
        Route::group($this->routeConfiguration(), function (): void {
            Route::group(['middleware' => 'api'], function (): void {
                $this->loadRoutesFrom($this->rootPath . '/routes/api.php');
            });

            Route::group(['middleware' => 'web'], function (): void {
                $this->loadRoutesFrom($this->rootPath . '/routes/web.php');
            });
        });
    }

    /**
     * Get the Telescope route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration(): array
    {
        return [
            'namespace' => 'Halal\Halal\Http\Controllers',
        ];
    }

    /**
     * Load resources when the app is run on console
     */
    private function loadConsoleResources(): void
    {
        $this->loadMigrationsFrom($this->rootPath . '/database/migrations');
    }
}
