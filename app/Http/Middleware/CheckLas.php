<?php

namespace App\Http\Middleware;

use Closure;

class CheckLas
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
       
         $user=session('admin');
            if(!$user){
                 return redirect('/liuyan/login');
        }
        return $next($request);
    }
}
