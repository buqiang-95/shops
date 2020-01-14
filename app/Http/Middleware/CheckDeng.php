<?php

namespace App\Http\Middleware;

use Closure;

class CheckDeng
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
         $user=session('kasa');
            if(!$user){
                 return redirect('/kuguan/login');
        }
        return $next($request);
    }
}
