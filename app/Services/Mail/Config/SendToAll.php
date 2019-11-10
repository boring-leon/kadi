<?php

namespace App\Services\Mail\Config;

use App\Mail\FeedbackRequest;
use App\Models\User;
use Carbon\Carbon;

class SendToAll implements IConfig
{
    public function getMail($user){
        return new FeedbackRequest($user);
    }

    public function getTarget(){
        $users = User::query();
        return $users->where(function($query){
            $query->where('email', '=', 'poriusz@wp.pl')
            ->orWhere('created_at', '>=', Carbon::create('2019-10-18')->toDateTimeString());
        })->get();
    }
}