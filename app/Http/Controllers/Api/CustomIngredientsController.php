<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrUpdateIngredient;

use App\Models\User;
use App\Models\CustomIngredient;
use App\Services\Builders\IngredientBuilder;

class CustomIngredientsController extends Controller
{
    private $ingredientBuilder;

    public function __construct(IngredientBuilder $ingredientBuilder){
        $this->middleware('api.token');
        $this->ingredientBuilder = $ingredientBuilder;
    }

    public function store(StoreOrUpdateIngredient $request, User $user){
        $ingredient = $user->ingredients()->create($this->ingredientBuilder->getModelData());
        return response()->json($ingredient);
    }

    public function update(StoreOrUpdateIngredient $request, CustomIngredient $ingredient){
        $ingredient->update($this->ingredientBuilder->getModelData());
        return response()->json($ingredient);
    }

    public function delete(CustomIngredient $ingredient){
        $ingredient->delete();
        return response()->json($ingredient);
    }
}
