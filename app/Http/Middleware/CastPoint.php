<?php

namespace App\Http\Middleware;

use Closure;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;

class CastPoint
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
        if($request->lng and  $request->lat){
            $point = new Point($request->lat ,$request->lng,4326);
            $request->request->set('location',$point);
            $request->request->remove('lat');
            $request->request->remove('lng');
        }
        return $next($request);
    }
}
