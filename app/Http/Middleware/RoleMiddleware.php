<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        if ($role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('client.produits');
    }
}
