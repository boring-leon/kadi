<?php 

namespace App\Services\Mail\Config;

interface IConfig
{
    public function getMail($data);
    public function getTarget();
}