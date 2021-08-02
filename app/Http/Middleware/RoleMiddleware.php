<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Collection;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->guest()){
            session()->put('url.intended', url()->current());
            return redirect('/login')->with('error', 'Oops, please log in first!!!');
        }

        $hasRole = $request->user()->hasRole($role);

        if ($hasRole){
            return $next($request);
        }

        return redirect('/')->with('error', 'Oops, you don\'t have access to that!!!');


    }
}
