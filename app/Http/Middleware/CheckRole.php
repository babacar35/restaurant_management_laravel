<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (!$user || !$user->isActive()) {
            abort(403, 'Accès non autorisé.');
        }

        // Si l'utilisateur est admin, on le laisse passer partout
        if ($user->isAdmin()) {
            return $next($request);
        }

        // Convertir un seul rôle en tableau
        $roles = is_array($roles) ? $roles : [$roles];

        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        abort(403, 'Accès non autorisé pour votre rôle.');
    }
}
