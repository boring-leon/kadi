<?php

namespace App\Services\Mail\Config;

use App\Mail\FeedbackRequest;
use App\Models\User;

class SendToAll implements IConfig
{
    public function getMail($user){
        return new FeedbackRequest($user);
    }

    public function getTarget(){
        return User::all();
    }
}