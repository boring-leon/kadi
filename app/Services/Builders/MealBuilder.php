<?php

namespace App\Services\Builders;

class MealBuilder extends ModelBuilder
{
    /**
     * This class makes sure that the "ingredients" field will get ONLY id, weight and is_custom
     * properties and not some other stuff that comes with request
     */

    private $excludeData = ['ingredients'];

    protected function getAdditionalData(): array {
        return [
            'ingredients' => array_map([$this, 'callback'], request('ingredients'))
        ];
    }
   
    private function callback($item){
        return [
            'id' => $item['id'],
            'weight' => $item['weight'],
            'is_custom' => $item['is_custom']
        ];
    }
}