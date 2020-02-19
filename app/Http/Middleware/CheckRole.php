<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $place)
    {
        if($request->role == $role && $request->place == $place) {
            return $next($request);
        }

        return redirect('home');
    }
}
