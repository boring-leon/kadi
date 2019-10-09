<?php

namespace App\Filters;

class KeyHasValue extends Filter
{
    protected $keyIndex = 'key';

    public function applyOnEloquentCollection($builder){
        return $builder->where($this->getKey(), '=', $this->getValue());
    }

    public function applyOnCollection($builder){
        return $builder->filter(function($model){
            $hasAttribute = array_key_exists($this->getKey(), $model->getAttributes());
            return $hasAttribute ? $model->{$this->getKey()} == $this->getValue() : false;
        });
    }

    public function getValue(){
        return request('val');
    }
}