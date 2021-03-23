<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::if('admin', function () {
            return optional(auth()->user())->isAdmin();
        });

        Blade::if('superadmin', function () {
            return optional(auth()->user())->id == 1;
        });

        Blade::if('company', function () {
            return optional(auth()->user())->isCompany();
        });

        Blade::if('trial', function () {
            return optional(auth()->user())->isTrial();
        });

        Blade::if('subscribed', function () {
            return optional(auth()->user())->isSubscribed();
        });

        Blade::if('subscription_ending', function () {
            return optional(auth()->user())->isSubscription_ending();
        });

        Blade::component('shared._card', 'card');
    }
}
