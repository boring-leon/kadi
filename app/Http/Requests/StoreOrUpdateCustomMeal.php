<?php

namespace App\Http\Requests;

use App\Rules\IngredientExists;

class StoreOrUpdateCustomMeal extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'ingredients' => ['bail', 'required', 'array', 'min:1'],
            'ingredients.*.weight' => ['bail', 'required', 'numeric', 'min: 0.01'],
            'ingredients.*.is_custom' => ['bail', 'required','boolean'],
            'ingredients.*' => ['required', new IngredientExists],
        ];
    }
}
