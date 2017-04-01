<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Setting $settings)
    {
        $settings = Cache::remember('settings', 60, function() use ($settings)
        {
            // Laravel >= 5.2, use 'lists' instead of 'pluck' for Laravel <= 5.1
            return $settings->pluck('value', 'name')->all();
        });

        config()->set('settings', $settings);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton('settings', function ($app) {
//            return $app['cache']->remember('site.settings', 60, function () {
//                return Setting::pluck('value', 'key')->toArray();
//            });
//        });
    }
}
