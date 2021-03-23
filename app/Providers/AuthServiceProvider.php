<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Link;
use App\Policies\CategoryPolicy;
use App\Policies\LinkPolicy;
use App\Policies\UserPolicy;
use App\Policies\UserProfilePolicy;
use App\Category;
use App\User;
use App\UserProfile;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Category::class => CategoryPolicy::class,
        Link::class => LinkPolicy::class,
        User::class => UserPolicy::class,
        UserProfile::class => UserProfilePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
