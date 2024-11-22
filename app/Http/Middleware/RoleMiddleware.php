<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int|string  $role  Le rôle requis pour accéder à la page
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Vérifie si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in to access this resource.');
        }

        // Vérifie si l'utilisateur est connecté, a le rôle requis et est actif
        if (Auth::check() && Auth::user()->role === (int) $role && Auth::user()->isActive) {
            return $next($request);
        
        // Journalise l'accès non autorisé
        Log::warning(sprintf(
            'Access denied for user ID: %d (role: %d), required role: %s',
            Auth::id(),
            Auth::user()->role,
            $role
        ));

        // Redirige l'utilisateur non autorisé
        return redirect()->route('access.denied')->with('error', 'You do not have permission to access this resource.');
    }
}
