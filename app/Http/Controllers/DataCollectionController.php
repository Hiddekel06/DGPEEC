<?php

namespace App\Http\Controllers;

use App\Models\DataCollection;
use App\Models\Ministere;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DataCollectionController extends Controller
{
    public function create(Ministere $ministere): View
    {
        return view('data-collections.create', compact('ministere'));
    }

    public function store(Request $request, Ministere $ministere): RedirectResponse
    {
        $validated = $request->validate([
            'form_data' => 'required|array',
        ]);

        DataCollection::create([
            'user_id' => auth()->id(),
            'ministere_id' => $ministere->id,
            'form_data' => $validated['form_data'],
        ]);

        return redirect()->route('data-collections.success')
            ->with('success', 'Données collectées avec succès !');
    }

    public function success(): View
    {
        return view('data-collections.success');
    }

    public function index(): View
    {
        $collections = DataCollection::where('user_id', auth()->id())
            ->with('ministere')
            ->latest()
            ->get();

        return view('data-collections.index', compact('collections'));
    }
}
