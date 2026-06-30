<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            return $next($request);
        }elseif (Auth::user() && Auth::user()->role == 'user') {
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }else {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
    }
}
