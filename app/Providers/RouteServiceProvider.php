<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::macro('catch', function ($action) {
            $this->any('{anything}', $action)->where('anything', '.*')->fallback();
        });

        parent::boot();

        Route::bind('link', function ($id) {
            return \App\Link::withoutGlobalScopes()->findOrFail($id);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        //  $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapCompanyRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, 
     * require authentication and an admin user, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web', 'auth', 'admin')
            ->namespace($this->namespace)
            ->prefix('/admin')
            ->group(base_path('routes/admin.php'));
    }

    protected function mapCompanyRoutes()
    {
        Route::middleware('web', 'auth', 'company')
            ->namespace($this->namespace)
            ->prefix('/company')
            ->group(base_path('routes/company.php'));
    }

    // /**
    //  * Define the "api" routes for the application.
    //  *
    //  * These routes are typically stateless.
    //  *
    //  * @return void
    //  */
    // protected function mapApiRoutes()
    // {
    //     Route::prefix('api')
    //         ->middleware('api')
    //         ->namespace($this->namespace)
    //         ->group(base_path('routes/api.php'));
    // }
}
