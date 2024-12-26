<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifions si l'utilisateur est connecté
        if ($user = $request->user()) {
            // Vérifions que l'utilisateur a un rôle
            if ($user->role) {
                if ($user->isAdmin()) {
                    return redirect()->route('admin.dashboard');
                }
                if ($user->isManager()) {
                    return redirect()->route('manager.dashboard');
                }
                if ($user->isStaff()) {
                    return redirect()->route('staff.dashboard');
                }
                if ($user->isClient()) {
                    return redirect()->route('client.dashboard');
                }
            }
        }

        return $next($request);
    }
} 