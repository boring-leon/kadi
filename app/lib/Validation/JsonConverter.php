<?php 

namespace App\Lib\Validation;

class JsonConverter
{   
    public function getArray(array $values){
        return array_map([$this, 'get'], $values);
    }

    public function get($value){
        if($this->isJson($value)){
            return json_decode($value);
        }
        
        return $value;
    }
    
    private function isJson(...$args) {
        if(is_string(...$args)){
            json_decode(...$args);
            return json_last_error() === JSON_ERROR_NONE ;
        }
        
        return false;
    }
}