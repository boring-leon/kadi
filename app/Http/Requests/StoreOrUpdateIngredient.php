<?php

namespace App\Http\Requests;

use App\Rules\InConfig;

class StoreOrUpdateIngredient extends FormRequest
{
    public function rules(){
        return [
            'name' => ['required', 'string'],
            'type' => ['required', 'string', new InConfig('static.ingredient_types')],
            'exchanger' => ['required', 'numeric', 'min: 0'],
            'kcal' => ['required', 'numeric', 'min: 0.01'],
            'glycemic_index' => ['nullable', 'numeric', 'min:0', 'max:125'],
            'portion_name' => ['nullable', 'string'],
            'portion_weight' => ['nullable', 'numeric', 'min: 0.01']
        ];
    }

}
