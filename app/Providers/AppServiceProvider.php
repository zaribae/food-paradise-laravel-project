<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        $keys = ['pusher_app_id', 'pusher_key', 'pusher_secret', 'pusher_cluster'];
        $pusheConfig = Setting::whereIn('key', $keys)->pluck('value', 'key');
        config([
            'broadcasting.connections.pusher.key' => $pusheConfig['pusher_key'],
            'broadcasting.connections.pusher.secret' => $pusheConfig['pusher_secret'],
            'broadcasting.connections.pusher.app_id' => $pusheConfig['pusher_app_id'],
            'broadcasting.connections.pusher.options.cluster' => $pusheConfig['pusher_cluster']
        ]);
    }
}
