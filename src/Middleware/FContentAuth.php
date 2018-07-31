<?php

namespace FContent\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class FContentAuth
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


        if(Auth::guest()) {
            return redirect()->route('fcontent.login');
        }

        return $next($request);
    }
}
