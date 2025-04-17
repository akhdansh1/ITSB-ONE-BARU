<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role !== $role) {
            Auth::logout();
            return redirect()->route("login.$role")->withErrors([
                'email' => "Anda bukan $role.",
            ]);
        }

        return $next($request);
    }
}
