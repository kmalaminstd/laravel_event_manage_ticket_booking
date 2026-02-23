<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
    public function boot(): void
    {
    
        Gate::define('user', function(User $user){
            return $user->role === 'user';
        });

        Gate::define('organizer', function(User $user){
            return $user->role === 'organizer';
        });

        Gate::define('admin', function(User $user){
            return $user->role === 'admin';
        });

    }
}
