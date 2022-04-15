<?php

namespace App\Http\Middleware;
  
use Closure;
   
class IsPeserta{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(auth()->user() != null && auth()->user()->is_admin != 1){
            return $next($request);
        }
   
        return redirect(route('peserta.login'))->with('error',"You don't have admin access.");
    }
}