<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $arUser=Auth::user();
        $username=$arUser->username;
        if(strpos($role, $username)===false){
           return  redirect('noaccess1');
        }
        return $next($request);
    }
}
