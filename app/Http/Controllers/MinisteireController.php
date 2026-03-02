<?php

namespace App\Http\Controllers;

use App\Models\Ministere;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MinisteireController extends Controller
{
    public function selectIndex(): View
    {
        $ministeres = Ministere::orderBy('name')->get();
        return view('ministeres.select', compact('ministeres'));
    }

    public function handleSelection(Request $request): RedirectResponse
    {
        $request->validate([
            'ministere_id' => 'required|exists:ministeres,id'
        ]);

        $ministere = Ministere::findOrFail($request->ministere_id);
        
        // Vérifier si le ministère nécessite une authentification
        if ($ministere->requires_authentication) {
            return redirect()->route('auth.login-form', $ministere);
        }
        
        // Ministères en flux direct (sans matricule)
        if (in_array($ministere->code, ['CFJ', 'CNFTEFCPN', 'APEN'], true)) {
            return redirect()->route('form.show-direct', $ministere);
        }
        
        // Redirection directe vers le formulaire
        return redirect()->route('form.show', $ministere);
    }
}
