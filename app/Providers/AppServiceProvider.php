<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
        Gate::define('operasional', function(User $user){
           return $user->role === 'operasional';
        });

        Gate::define('keuangan', function(User $user){
           return $user->role === 'keuangan';
        });

        Gate::define('admin', function(User $user){
           return $user->role === 'admin';
        });
    }
}
