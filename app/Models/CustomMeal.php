<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomMeal extends Model
{
    public $table = 'user_meals';
    public $timestamps = false;
    public $fillable = ['name', 'ingredients'];
    public $casts = [
        'ingredients' => 'array',
    ];
}
