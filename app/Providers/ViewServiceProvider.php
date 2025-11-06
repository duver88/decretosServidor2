<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Compartir datos del usuario autenticado con todas las vistas
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();

                // Pre-cargar relaciones necesarias para evitar N+1 queries
                $user->load([
                    'modules',
                    'categoryPermissions.category',
                    'conceptTypes'
                ]);

                // Cachear verificaciones de permisos comunes
                $view->with('userHasCreatePermission', $user->categoryPermissions->where('can_create', true)->isNotEmpty());
                $view->with('userHasConceptCreatePermission', $user->conceptTypes->where('pivot.can_create', true)->isNotEmpty());
            }
        });
    }
}
