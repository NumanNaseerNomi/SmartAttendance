<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use Illuminate\Http\Request;

class ifAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('user') && Session::get('user')->isAdmin)
        {
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
