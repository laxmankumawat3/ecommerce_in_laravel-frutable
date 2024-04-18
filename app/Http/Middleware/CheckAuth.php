<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            // Check if the user is authenticated
            if (!auth()->check()) {
                // User is not authenticated, handle unauthorized access here
                // return response('Unauthorized', 401);
                return redirect('login');
            }
        return $next($request);
    }
}
