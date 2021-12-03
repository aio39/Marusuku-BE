<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateSessionTimeoutCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $res =  $next($request);
        if(Auth::check()){
            $res->cookie('logged',"", config('SESSION_LIFETIME') ?? 120,"/");
        }
        return $res;
    }
}
