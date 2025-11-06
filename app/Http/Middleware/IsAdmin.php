<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y es administrador
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Si el usuario está autenticado pero no es admin, redirigir a bienvenida
        if (Auth::check()) {
            return redirect()->route('user.welcome')->with('error', 'No tienes permisos para acceder a esta área.');
        }

        // Si no está autenticado, redirigir al login
        return redirect()->route('login')->with('error', 'Debes iniciar sesión primero.');
    }
}
