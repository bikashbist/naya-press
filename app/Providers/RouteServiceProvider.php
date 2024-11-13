<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use Illuminate\Routing\Router;
use Illuminate\Http\Request;

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
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(Router $router, Request $request)
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes($router, $request);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes(Router $router, Request $request)
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));

        //======================= Lochan:edited========================
        // $locale = $request->segment(1);
        // $this->app->setLocale($locale);
        // $skipLocales = $this->app->config->get('app.skip_locales');

        // If the locale is added to skip_locales array continue without locale
        // if (in_array($locale, $skipLocales)) {
        //     $router->group(['namespace' => $this->namespace, 'middleware' => 'web',], function ($router) {
        //         require base_path('routes/web.php');
        //     });
        // } else {
        //     $router->group(['namespace' => $this->namespace, 'middleware' => 'web', 'prefix' => $locale], function ($router) {
        //         require base_path('routes/web.php');
        //     });
        // }

    }



    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
