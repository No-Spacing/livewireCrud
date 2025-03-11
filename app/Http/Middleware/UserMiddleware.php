<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->has('user') && $request->path() != '/' && $request->path() != 'register')
        {
            return back()->with('fail','User must be logged in');
        }

        if(session()->has('user') && $request->path() == '/' || $request->path() == 'register'){
            return redirect('/create-post');
        }

        return $next($request);
    }
}
