<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public $timestamps = false;
    public $fillable = ['name', 'type', 'weight','exchanger', 'portion', 'kcal', 'glycemic_index'];
    public $casts = [
        'portion' => 'array'
    ];
}
