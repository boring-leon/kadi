<?php

namespace App\Services\Meal;

use App\Models\CustomIngredient;
use Illuminate\Support\Collection;
use App\Models\CustomMeal;

class CustomMealUpdater
{
    private $customMeals;
    private $deletedIngredient;

    public function removeFromAll(CustomIngredient $ingredient) : Collection {
        $this->setDeletedIngredient($ingredient);
        
        return $this->customMeals = $this->customMeals->map(function($meal){
            $meal->ingredients = $this->getFilteredIngredients($meal->ingredients);
            return $meal;
        });
    }

    public function saveAll(){
        foreach($this->customMeals as $meal){
            $meal->save();
        }
    }

    public function getFilteredIngredients(array $ingredients): array {
        $filter = new IngredientFilter($this->deletedIngredient->id);
        return array_filter($ingredients, [$filter, "shouldIngredientStay"]);
    }

    /* Setters */
    public function setMeals(Collection $customMeals){
        $this->customMeals = $customMeals;
    }

    public function setDeletedIngredient(CustomIngredient $ingredient){
        $this->deletedIngredient = $ingredient;
    }
}