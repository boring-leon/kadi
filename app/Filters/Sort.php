<?php

namespace App\Filters;

class Sort extends Filter
{
    protected $keyIndex = 'sort';

    public function applyOnCollection($builder){
        return $this->getKey() == 'asc' 
        ? $builder->sortBy($this->getValue())
        : $builder->sortByDesc($this->getValue());
    }

    public function applyOnEloquentCollection($builder){
        return $builder->orderBy($this->getValue(), $this->getKey());
    }

    public function getValue(){
        return request('sort_by', 'name');
    }
}