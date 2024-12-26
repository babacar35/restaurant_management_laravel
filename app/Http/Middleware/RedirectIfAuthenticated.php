<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                
                if ($user->isAdmin()) {
                    return redirect()->route('admin.dashboard');
                }
                if ($user->isManager()) {
                    return redirect()->route('manager.dashboard');
                }
                if ($user->isStaff()) {
                    return redirect()->route('staff.dashboard');
                }
                
                return redirect()->route('client.dashboard');
            }
        }

        return $next($request);
    }
} 