<?php

namespace lp\surveys;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class SurveysServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->make('lp\surveys\Controllers\SurveysController');
        $this->loadViewsFrom(__DIR__ . '/view','surveys');
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        include __DIR__.'/routes.php';

        $this->loadMigrationsFrom('vendor/lp/surveys/database/migrations');

        Log::info('ServiceProvider booting...');
        $this->app->bind('lp\surveys\Models\Survey', function ($app, $id) {
            Log::info('Model binding for id: ' . implode(',', $id));
            return \LP\surveys\Models\Survey::find($id);
        });

        if ($this->app->runningInConsole()) {
            $this->publishes([
                'vendor/lp/surveys/database/migrations' => database_path('migrations'),
            ], 'migrations');
        }
    }
}
