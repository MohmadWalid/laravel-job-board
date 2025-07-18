<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyMe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user login
        if (Auth::check()) {

            // Check if the user is 'Lido@lido'
            if (Auth::user()->email == 'Lido@lido')
                return $next($request);

            // The user logedin but he don't have the access
            return response(['message' => 'Access is not proper!'], 403);
        }
        // User didn't login
        return redirect(route('login'));
    }
}
