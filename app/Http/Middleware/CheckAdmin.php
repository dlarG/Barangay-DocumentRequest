<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->roleType === 'admin') {
            return $next($request);
        }
        return redirect()->route('login')->with('error', 'Unauthorized access');
    }
}