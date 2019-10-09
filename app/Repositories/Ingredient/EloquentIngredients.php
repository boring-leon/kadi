<?php

namespace App\Repositories\Ingredient;

use App\Models\Ingredient;

class EloquentIngredients implements IngredientQueries
{
    public function all(){
        return Ingredient::all();
    }

    public function find($id){
        return Ingredient::find($id);
    }

    public function create(array $data){
        return Ingredient::create($data);
    }

    public function update(Ingredient $instance, array $data){
        $instance->update($data);
        return $instance;
    }

    public function delete(Ingredient $instance){
        $instance->delete();
        return $instance;
    }
}