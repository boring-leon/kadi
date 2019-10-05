<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class RenderConstructionView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(config('static.is_under_construction')){
            return new Response(view('dev_construction'));
        }
        return $next($request);
    }
}
