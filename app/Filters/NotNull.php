<?php

namespace App\Filters;

class NotNull extends Filter
{
    protected $keyIndex = 'not_null';

    public function applyOnEloquentCollection($builder){
        return $builder->whereNotNull($this->getValue());
    }

    public function applyOnCollection($builder){
        return $builder->filter(function($model){
            $hasAttribute = array_key_exists($this->getKey(), $model->getAttributes());
            return $hasAttribute ? is_null($model->{$this->getKey()}) == false : false;
        });
    }
}