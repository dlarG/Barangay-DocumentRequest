<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckResident
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->roleType === 'resident') {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Unauthorized access');
    }
}
