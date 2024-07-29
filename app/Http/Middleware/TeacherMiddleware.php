<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Assuming you have a 'role' column in your users table
        if (Auth::check() && Auth::user()->role === 'teacher') {
            return $next($request);
        }

        // If the user is not authenticated or not a teacher, redirect them
        return redirect()->back();
    }
}
