<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrUpdateCustomMeal;

use App\Services\Builders\MealBuilder;
use App\Models\CustomMeal;
use App\Models\User;

class CustomMealsController extends Controller
{
    private $mealBuilder;

    public function __construct(MealBuilder $mealBuilder){
        $this->middleware('api.token');
        $this->mealBuilder = $mealBuilder;
    }

    public function store(StoreOrUpdateCustomMeal $request, User $user){
        $meal = $user->meals()->create($this->mealBuilder->getModelData());
        return $meal;
    }

    public function update(StoreOrUpdateCustomMeal $request, CustomMeal $meal){
        $meal->update($this->mealBuilder->getModelData());
        return $meal;
    }

    public function delete(CustomMeal $meal){
        $meal->delete();
        return $meal;
    }
}
