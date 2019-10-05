<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Ingredient\IngredientQueries;
use App\Repositories\Ingredient\EloquentIngredients;
use App\Repositories\Ingredient\CachedIngredients;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind(IngredientQueries::class, CachedIngredients::class);

        $this->app
                ->when(CachedIngredients::class)
                ->needs(IngredientQueries::class)
                ->give(EloquentIngredients::class);
    }
}
