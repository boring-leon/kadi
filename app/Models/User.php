<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $appends = ['isAdmin'];

    protected $fillable = [
        'name', 'email', 'password', 'exchanger'
    ];

    protected $visible = [
        'id', 'name', 'api_token', 'exchanger', 'isAdmin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ingredients(){
        return $this->hasMany(\App\Models\CustomIngredient::class);
    }

    public function meals(){
        return $this->hasMany(\App\Models\CustomMeal::class);
    }

    public static function boot(){
        parent::boot();
        
        static::creating(function($model){
            $model->api_token = str_random(40);
        });

        static::deleting(function($model){
            $model->meals()->delete();
            $model->ingredients()->delete();
        });
    }

    public function getIsAdminAttribute(){
        return in_array($this->email, config('static.admin_emails'));
    }
}
