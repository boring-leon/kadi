<?php

namespace App\Filters;

use Illuminate\Support\Collection;
use Closure;

abstract class Filter
{
    protected $key;

    public function handle($request, Closure $next){
        return request()->has($this->keyIndex) 
        ? $this->runBuilder($next($request))
        : $next($request);
    }

    private function runBuilder($builder){
        return $builder instanceof Collection
        ? $this->applyOnCollection($builder)
        : $this->applyOnEloquentCollection($builder);
    }

    public abstract function applyOnEloquentCollection($builder);
    public function applyOnCollection($builder){
        return $this->applyOnEloquentCollection($builder);
    }

    public function getValue(){
        return $this->getKey();
    }

    public function getKey(){
        return request($this->keyIndex);
    }
}