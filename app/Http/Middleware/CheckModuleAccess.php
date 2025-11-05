<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $moduleSlug  El slug del módulo a verificar
     */
    public function handle(Request $request, Closure $next, string $moduleSlug): Response
    {
        // Si el usuario no está autenticado, redirigir al login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Los administradores siempre tienen acceso
        if ($user->is_admin) {
            return $next($request);
        }

        // Verificar si el usuario tiene acceso al módulo
        if (!$user->hasModuleAccess($moduleSlug)) {
            abort(403, 'No tienes acceso a este módulo. Contacta al administrador para solicitar permisos.');
        }

        return $next($request);
    }
}
