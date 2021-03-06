<?php

namespace App\Http\Middleware;

use Closure;

class AccessOwnContent
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
        if (auth()->check()){
            if (isset($request->user->username) && ($request->user->username !== auth()->user()->username)) {
                abort('404');
            }
        }

        return $next($request);
    }
}
