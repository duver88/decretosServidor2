<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Limpiar la URL "intended" para evitar redirecciones incorrectas
        $request->session()->forget('url.intended');

        $user = $request->user();

        if ($user->is_admin) {
            return redirect()->route('dashboard');
        } else {
            // Verificar si el usuario tiene al menos un módulo asignado
            $userModules = $user->getAccessibleModules();

            if ($userModules->isEmpty()) {
                // Si no tiene módulos, redirigir a la página de bienvenida
                return redirect()->route('user.welcome');
            }

            // Redirigir al primer módulo disponible
            $firstModule = $userModules->first();

            if ($firstModule->slug === 'actos-administrativos') {
                return redirect()->route('user.dashboard');
            } elseif ($firstModule->slug === 'conceptos') {
                return redirect()->route('concepts.index');
            } elseif ($firstModule->slug === 'circulares') {
                return redirect()->route('circulares.admin.index');
            }

            // Si no coincide con ninguno conocido, ir a bienvenida
            return redirect()->route('user.welcome');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
