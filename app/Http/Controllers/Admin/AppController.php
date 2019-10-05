<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function cache(){
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        return redirect()->back();
    }

    public function userList(){
        $records = \App\Models\User::orderByDesc('created_at');
        $data = [
            'total_users' => count($records->get()) -2,
            'verified_users' => count($records->get()->filter->email_verified_at) -2,
            'users' => $records->paginate(15),
        ];
        return view('admin.user_list')->with($data);
    }

    public function runCommand(Request $request){
        $this->validate($request, [
            'command' => ['required', 'string'] 
        ]);
        Artisan::call($request->command);
    }
}
