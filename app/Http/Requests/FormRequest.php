<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as LaravelRequest;

class FormRequest extends LaravelRequest
{
    public function authorize(){
        return true;
    }

    public function withValidator($validator){
        $errors = $validator->errors()->all();
        
        return $this->redirector->to($this->getRedirectUrl())
        ->withInput($this->except($this->dontFlash))
        ->withErrors($errors, $this->errorBag);
    }
}