<?php

namespace App\Services\Meal;

class IngredientFilter
{
    private $deletedIngredientId;

    public function __construct(int $deletedIngredientId){
        $this->deletedIngredientId = $deletedIngredientId;
    }

    public function shouldIngredientStay(array $ingredient) :bool {
        return (
            $ingredient['id'] == $this->deletedIngredientId && $ingredient['is_custom']
        ) == false;
    }
}