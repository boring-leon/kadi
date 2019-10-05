<?php 

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class ApiToken
{   
    public function handle($request, Closure $next)
    {
        $user = User::where([
            'id' => $request->user_id,
            'api_token' => $request->api_token
        ]);
        
        if(!$user->exists()){
            return response()->json([ 'problem' => 'api token authentication failed' ], 422);
        }
            
        return $next($request);
    }
}