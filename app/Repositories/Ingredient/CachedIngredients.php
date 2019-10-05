<?php

namespace App\Repositories\Ingredient;

use App\Models\Ingredient;
use App\Repositories\Ingredient\IngredientQueries;
use App\Services\Cache\CollectionModelUpdater;
use Illuminate\Contracts\Cache\Repository as Cache;

class CachedIngredients implements IngredientQueries
{
    private $base, $cache, $collectionUpdater;

    public function __construct(IngredientQueries $base, Cache $cache){
        $this->base = $base;
        $this->cache = $cache;
        $this->collectionUpdater = new CollectionModelUpdater($this->all());
    }

    public function all(){
        return $this->cache->rememberForever('ingredients', function(){
            return $this->base->all();
        });
    }

    public function find($id){
        return $this->all()->firstWhere('id', $id);
    }

    public function create(array $data){
        $this->base->create($data);
        $this->refreshCache();
    }

    public function update(Ingredient $instance, array $data){
        $instance = $this->base->update($instance, $data);
        $this->refreshCache($this->collectionUpdater->update($instance));
    }

    public function delete(Ingredient $instance){
        $instance = $this->base->delete($instance);
        $this->refreshCache($this->collectionUpdater->delete($instance));
    }

    private function refreshCache($data = null){
        $ingredients = is_null($data) ? $this->base->all() : $data;
        $this->cache->forget('ingredients');
        $this->cache->forever('ingredients', $ingredients);
    }
}