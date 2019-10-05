<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogFile extends Command
{
    protected $signature = 'log:clear';
    protected $description = 'Clear the laravel.log file';
    
    public function __construct(){
        parent::__construct();
    }
    
    public function handle(){
        exec('echo "" > ' . storage_path('logs/laravel.log'));
        $this->info('Logs have been cleared');
    }
}
