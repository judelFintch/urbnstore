<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  int  $role  Rôle requis
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Vérifie si l'utilisateur est connecté, a le rôle requis et est actif
        if (Auth::check() && Auth::user()->role === (int) $role && Auth::user()->isActive) {
            return $next($request);
        }

        // Si l'utilisateur n'est pas autorisé ou inactif
        abort(403, 'Unauthorized or inactive account');
    }
}
