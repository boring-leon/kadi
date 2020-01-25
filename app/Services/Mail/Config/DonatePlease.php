<?php

namespace App\Services\Mail\Config;

use App\Mail\DonateRequest;
use App\Models\User;


class DonatePlease implements IConfig
{
    public function getMail($user){
        return new DonateRequest($user);
    }

    public function getTarget(){
        $users = User::query();
        return $users->where(function($query){
            $query->where('email', '!=', 'margerita.c@wp.pl');
        })->get();
    }
}