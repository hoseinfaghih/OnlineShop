<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if (session()->has('LoggedUser') && ($request->path() == 'user/login'  || $request->path() == 'user/register')){
            return redirect('');
        }
        if (!session()->has('LoggedUser') && $request->path() == 'user/logout'){
            return redirect('');
        }
        if (!session()->has('LoggedUser') && ($request->path() == 'showfavs' || $request->path() == 'dashboard')){
            return redirect ('');
        }
        return $next($request);
    }
}
