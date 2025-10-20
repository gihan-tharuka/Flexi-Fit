<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has an 'admin' role
        if (Auth::check() && Auth::user()->role->value == 1) {
            return $next($request);
        }

        // If the user is not an admin, redirect them
        return redirect('/')->with('error', 'You do not have access to the admin dashboard.');

    }
}
