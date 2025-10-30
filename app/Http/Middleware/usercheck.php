<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please log in to continue.');
        }

        if (auth()->user()->role !== 'admin') {
            return redirect()->route('/')->with('error', 'Access denied.');
        }

        return $next($request);
    }
}