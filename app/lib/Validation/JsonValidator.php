<?php

namespace App\Lib\Validation;

use Validator;

class JsonValidator
{
    public function __construct(JsonConverter $converter){
        $this->converter = $converter;
    }

    public function getErrors(array $rules){
        $data = request()->all();    
        $validator = Validator::make($this->converter->getArray($data), $rules);
        
        return $validator->errors()->all();
    }
}