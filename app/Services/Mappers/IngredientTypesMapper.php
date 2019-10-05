<?php

namespace App\Services\Mappers;

class IngredientTypesMapper extends ConfigMapper
{
    protected $configKey = "static.ingredient_types";
    
    protected function callback($item){
        return $this->toObject([
            'id' => $this->getItemIndex($item) + 1,
            'name' => $item
        ]);
    }

    protected function transformMapped($data){
        return collect($data)->sortBy('name')->values()->all();
    }
}