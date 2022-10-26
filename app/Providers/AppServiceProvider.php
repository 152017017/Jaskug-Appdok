<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(125);

        Gate::define('admin', function(User $user){
            return $user->is_admin;
        });

        Gate::define('operator', function(User $user){
            return $user->is_operator;
        });

        Gate::define('bisnis-user', function(User $user){
            return $user->is_bisnis;
        });
    }
}
