<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserLoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('userEmail') && ($request->path() != '/a'))
        {
            abort(404);
        }
        return $next($request);
        // ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
        //                         ->header('Pragma', 'no-cache')
        //                         ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
