<?php

namespace App\Repositories\Ingredient;

use App\Models\Ingredient;

interface IngredientQueries
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(Ingredient $instance, array $data);
    public function delete(Ingredient $instance);
}