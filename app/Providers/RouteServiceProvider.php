<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Leonc\RouteBinder\Binder;

use App\Models\Ingredient;
use App\Models\CustomIngredient;
use App\Models\CustomMeal;
use App\Models\User;

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
        Route::model('ingredient', Ingredient::class);
        Route::model('user', User::class);
        Route::bind('ingredient_belongs', function($ingredientId) {
            return Binder::build(CustomIngredient::class, $ingredientId)
            ->persistFailMessage('Nie znaleziono składnika')
            ->belongsTo(User::class, request('user_id'))
            ->bind();
        });
        
        Route::bind('meal_belongs', function($mealId){
            return Binder::build(CustomMeal::class, $mealId)
            ->persistFailMessage('Nie znaleziono posiłku')
            ->belongsTo(User::class, request('user_id'))
            ->bind();
        });
        
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
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
