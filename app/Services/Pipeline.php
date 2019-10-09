<?php 

namespace App\Services;

use Illuminate\Pipeline\Pipeline as LaravelPipeline;

class Pipeline
{
    private $data;

    public function data($data){
        $this->data = $data;
        return $this;
    }

    public function runThrough(array $pipes){
        return app(LaravelPipeline::class)->send($this->data)
        ->through($pipes)
        ->thenReturn();
    }
}