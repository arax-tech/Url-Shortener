<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
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
        if (Auth::check() && Auth::user()->role()=='Admin')
        {
            return $next($request);
        }
        else
        {
            return redirect('/admin/login')->with('flash_message_error','Please Login to Access...');
        }
    }
}
