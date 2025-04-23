<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checksession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !$request->session()->has(Auth::check())) {
            Auth::logout(); // Clear auth session
            $request->session()->invalidate(); // Clear all session data
            $request->session()->regenerateToken(); // Prevent CSRF issues

            return redirect('/'); // Go to home page
        }


        return $next($request);
    }
}
