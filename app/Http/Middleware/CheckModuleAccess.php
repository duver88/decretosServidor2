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
        \Log::info('=== CheckModuleAccess Middleware ===');
        \Log::info('Module Slug: ' . $moduleSlug);
        \Log::info('URL: ' . $request->url());

        // Si el usuario no está autenticado, redirigir al login
        if (!auth()->check()) {
            \Log::warning('Usuario no autenticado - redirigiendo a login');
            return redirect()->route('login');
        }

        $user = auth()->user();
        \Log::info('Usuario ID: ' . $user->id);
        \Log::info('Usuario Email: ' . $user->email);
        \Log::info('Es Admin: ' . ($user->is_admin ? 'true' : 'false'));

        // Los administradores siempre tienen acceso
        if ($user->is_admin) {
            \Log::info('ES ADMIN - Middleware permite acceso');
            return $next($request);
        }

        // Cachear la verificación de acceso al módulo por 5 minutos
        $cacheKey = "user_{$user->id}_module_access_{$moduleSlug}";

        $hasAccess = cache()->remember($cacheKey, 300, function () use ($user, $moduleSlug) {
            $result = $user->hasModuleAccess($moduleSlug);
            \Log::info('hasModuleAccess result (from function): ' . ($result ? 'true' : 'false'));
            return $result;
        });

        \Log::info('hasModuleAccess (cached or fresh): ' . ($hasAccess ? 'true' : 'false'));

        if (!$hasAccess) {
            \Log::warning('ACCESO DENEGADO - redirigiendo a user.welcome');
            // Redirigir a la página de bienvenida en lugar de mostrar error 403
            return redirect()->route('user.welcome')->with('error', 'No tienes acceso al módulo solicitado. Usuario: ' . $user->email . ' - Módulo: ' . $moduleSlug);
        }

        \Log::info('Middleware permite acceso - continuando');
        return $next($request);
    }
}
