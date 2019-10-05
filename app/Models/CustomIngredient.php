<?php

namespace App\Models;

use App\Events\CustomIngredientDeleted;

class CustomIngredient extends Ingredient
{
    protected $table = 'user_ingredients';
    public $dispatchesEvents = [
        'deleted' => CustomIngredientDeleted::class,
    ];
}
