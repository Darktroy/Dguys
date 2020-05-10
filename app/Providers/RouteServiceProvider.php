<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $apiNamespace = 'App\Http\Controllers\API';

    /*
     * The path to the "home" route for your application.
     *
     * @var string
     */

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    
    
/**
 * The path to the "home" route for your application.
 *
 * @var string
 */
public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapPublicAPIRoutes();
        $this->mapAuthAPIRoutes();
        $this->mapGuestAPIRoutes();
        //
        $this->mapAuthWebRoutes();
        $this->mapPublicWebRoutes();
        $this->mapGuestWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    
    public function mapAuthAPIRoutes()
    {
        foreach (glob(base_path('routes/api/auth/*.php')) as $file) {
            Route::prefix('api')
                ->middleware(['api', 'auth:api'])
                ->namespace($this->apiNamespace)
                ->group($file);
        }
    }

    public function mapAuthWebRoutes()
    {
        foreach (glob(base_path('routes/web/auth/*.php')) as $file) {
            Route::middleware(['web', 'auth'])
                ->namespace($this->namespace)
                ->group($file);
        }

    }

    public function mapGuestAPIRoutes()
    {
        foreach (glob(base_path('routes/api/guest/*.php')) as $file) {
            Route::prefix('api')
                ->middleware(['api', 'guest:api'])
                ->namespace($this->apiNamespace)
                ->group($file);
        }
    }

    public function mapGuestWebRoutes()
    {
        foreach (glob(base_path('routes/web/guest/*.php')) as $file) {
            Route::middleware(['web', 'guest'])
                ->namespace($this->namespace)
                ->group($file);
        }
    }

    public function mapPublicAPIRoutes()
    {
        foreach (glob(base_path('routes/api/public/*.php')) as $file) {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->apiNamespace)
                ->group($file);
        }
    }

    public function mapPublicWebRoutes()
    {
        foreach (glob(base_path('routes/web/public/*.php')) as $file) {
            Route::middleware(['web'])
                ->namespace($this->namespace)
                ->group($file);
        }

    }
}
