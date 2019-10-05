<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Lib\Validation\JsonValidator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $validator;
    
    public function __construct(JsonValidator $validator){
        $this->validator = $validator;
    }

    protected function validateJson(array $rules){
        $errors = $this->validator->getErrors($rules);
        if(count($errors)){
            return response()->json($this->validationFormat($errors))->throwResponse();
        }
    }

    protected function validationFormat(array $errors){
        return $errors;
    }
}
