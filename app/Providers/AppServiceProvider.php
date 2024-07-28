<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Policies\UserPolicy;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        User::class => UserPolicy::class,
        'App\Models\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

    }
}
