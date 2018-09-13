<?php

namespace App\Http\Middleware;

use Closure;

class recepcion
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
        if($request->user()->id_type == 2 || $request->user()->id_type == 1  ){

 
        return $next($request);
    }
    
       else{

        return redirect('/');
        }
    }
}
