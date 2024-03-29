<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUser
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
        if (Auth::check() && Auth::user()->role()=='User')
        {
            return $next($request);
        }
        else
        {
            return redirect('/login')->with('flash_message_error','Please Login to Access...');
        }
    }
}
