<?php

namespace App\Services\Mail;

use App\Services\Mail\Config\IConfig;
use Illuminate\Support\Facades\Mail;

class MailSender
{
    private $config;

    public function __construct(IConfig $config){
        $this->config = $config;
    }

    public function shouldSend(){
        return config('static.mailing.is_active');
    }

    public function sendMails(){
        $target = $this->config->getTarget();

        if(is_countable($target)){
            foreach($target as $item){
                Mail::to($item)->send($this->config->getMail($item));
            }
        }
        else{
            Mail::to($target)->send($this->config->getMail($target));
        }
    }

    public final function getConfig(){
        return $this->config;
    }
}