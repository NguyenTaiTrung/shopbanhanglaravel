<?php

namespace App\Http\Middleware;

use Closure;
use App;
class Languge
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
        if(session()->has('locate')){
            App:setlocale(session()->get('locate'));
        }
        return $next($request);
    }
}
