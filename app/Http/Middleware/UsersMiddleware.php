<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersMiddleware
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
        if (!Auth::check()) {
            return redirect()->route('login')->with('status', 'Please login');
        }
        if (Auth::user()->role =='admin') {
            return redirect()->route('admindashboard');
        }
        if (Auth::user()->role == 'user') {
            return $next($request);
        }
    }
}
