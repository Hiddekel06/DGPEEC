<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckAgentAuthentication
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ministere = $request->route('ministere');

        if (!$ministere) {
            return $next($request);
        }

        // Vérifier si le ministère nécessite une authentification
        if ($ministere->requires_authentication) {
            // Vérifier si l'agent est authentifié pour ce ministère
            if (!Session::get("agent_authenticated_{$ministere->id}")) {
                return redirect()->route('auth.login-form', $ministere)
                    ->with('message', 'Vous devez vous connecter pour accéder à ce formulaire.');
            }
        }

        return $next($request);
    }
}
