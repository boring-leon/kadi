<?php

namespace App\Events;

use App\Models\CustomIngredient;

class CustomIngredientDeleted
{
    public $ingredient;
    
    public function __construct(CustomIngredient $ingredient){
        $this->ingredient = $ingredient;
    }
}
