<?php

namespace App\Services\Cache;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CollectionModelUpdater
{
    public function __construct(Collection $collection){
        $this->collection = $collection;    
    }

    public function update(Model $model) :Collection {
        return $this->collection->map(function($item) use($model){
            return $item->id == $model->id ? $model : $item;
        });
    }

    public function delete(Model $model) :Collection {
        return $this->collection->filter(function($item) use($model){
            return $item->id != $model->id;
        });
    }
}