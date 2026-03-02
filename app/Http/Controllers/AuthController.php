<?php

namespace App\Http\Controllers;

use App\Models\AuthorizedAgent;
use App\Models\Ministere;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin(Ministere $ministere): View
    {
        if (!$ministere->requires_authentication) {
            abort(403, 'Ce ministère ne nécessite pas d\'authentification');
        }

        return view('auth.login', compact('ministere'));
    }

    public function login(Request $request, Ministere $ministere): RedirectResponse
    {
        if (!$ministere->requires_authentication) {
            abort(403, 'Ce ministère ne nécessite pas d\'authentification');
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'L\'email est obligatoire.',
            'email.email' => 'L\'email doit être valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ]);

        $agent = AuthorizedAgent::where('email', $request->email)
            ->where('ministere_id', $ministere->id)
            ->first();

        if (!$agent || !Hash::check($request->password, $agent->password)) {
            return redirect()->back()
                ->withErrors(['email' => 'Email ou mot de passe incorrect.'])
                ->withInput($request->only('email'));
        }

        // Créer une session d'authentification
        Session::put("agent_authenticated_{$ministere->id}", true);
        Session::put("agent_email_{$ministere->id}", $agent->email);
        
        // Si l'agent appartient à une direction, stocker l'ID de la direction
        if ($agent->direction_id) {
            Session::put("agent_direction_{$ministere->id}", $agent->direction_id);
        }

        return redirect()->route('form.show', $ministere);
    }

    public function logout(Ministere $ministere): RedirectResponse
    {
        Session::forget("agent_authenticated_{$ministere->id}");
        Session::forget("agent_email_{$ministere->id}");
        Session::forget("agent_direction_{$ministere->id}");

        return redirect()->route('ministeres.select');
    }
}
