<?php

namespace App\Filters;

class IsNull extends Filter
{
    protected $keyIndex = 'is_null';

    public function applyOnEloquentCollection($builder){
        return $builder->whereNull($this->getValue());
    }

    public function applyOnCollection($builder){
        return $builder->filter(function($model){
            $hasAttribute = array_key_exists($this->getKey(), $model->getAttributes());
            return $hasAttribute ? is_null($model->{$this->getKey()}) == true : false;
        });
    }
}