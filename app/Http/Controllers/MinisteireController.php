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
        
        // Vérifier si c'est le Centre de Formation Judiciaire (CFJ)
        if ($ministere->code === 'CFJ') {
            return redirect()->route('form.show-direct', $ministere);
        }
        
        return redirect()->route('matricule.show', $ministere);
    }
}
