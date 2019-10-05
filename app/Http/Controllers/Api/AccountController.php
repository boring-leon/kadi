<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class AccountController extends Controller
{
    public function __construct(){
        $this->middleware('api.token');
    }

    public function updateExchanger(Request $request){
        $this->validate($request, [
            'exchanger' => ['required', 'numeric', 'min:0.01', 'max:6'] 
        ]);
        
        $user = User::find($request->user_id);
        $user->exchanger = $request->exchanger;
        $user->save();
        
        return $user;
    }

    public function deleteAccount(Request $request){
        $user = User::find($request->user_id)->delete();
        return $user;
    }

}
