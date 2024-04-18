<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;


class adminAuthcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      $user = auth()->user(); // Get the authenticated user
//  die();
        if ( $user && $user->role == 1) {
            // User's role is not 1, handle unauthorized access here
            // return response('Unauthorized', 401);
            // or redirect to some other route
            // return redirect()->route('login')->with('message', 'You are not authorized.');
            return $next($request);
            
        }else{
            return response('you are not admin', '401');
            // return response()->view("login")->setStatusCode(401, 'You are not admin');
                    // $message = 'You are not admin';
                    // $status = 401;
                    // return new Response($message, $status);
        }
    }
}
