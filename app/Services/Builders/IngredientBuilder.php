<?php

namespace App\Services\Builders;

class IngredientBuilder extends ModelBuilder
{
    private $excludedData = ['portion_name', 'portion_weight'];

    protected function transformData(array $request) : array{
        return [
            "name" => strtolower($request['name'])
        ];
    }

    protected function getAdditionalData() : array{
        return [
            "portion" => [
                'name' => request('portion_name'),
                'weight' => request('portion_weight')
            ]
        ];
    }
}