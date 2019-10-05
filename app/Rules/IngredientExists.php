<?php

namespace App\Rules;

use App\Models\CustomIngredient;
use App\Models\Ingredient;
use Illuminate\Contracts\Validation\Rule;

class IngredientExists implements Rule
{
    public function passes($attribute, $value){
       return $value['is_custom'] ? 
       CustomIngredient::where(['id' => $value['id'], 'user_id' => request('user_id')])->exists() : 
       Ingredient::find($value['id']);
    }

    public function message()
    {
        return 'Podany składnik nie istnieje';
    }
}
