<?php

namespace App\Http\Controllers;

use App\Models\DataCollection;
use App\Models\Ministere;
use App\Models\FormConfig;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

class DataCollectionController extends Controller
{
    public function showMatricule(Ministere $ministere): View
    {
        return view('matricule.show', compact('ministere'));
    }

    public function validateMatricule(Request $request, Ministere $ministere): RedirectResponse
    {
        // Normalisation : trim + majuscules
        $matricule = strtoupper(trim($request->input('matricule')));

        // Validation format : au moins 6 chiffres + 1 lettre majuscule
        $request->merge(['matricule' => $matricule]);
        
        $request->validate([
            'matricule' => [
                'required',
                'regex:/^\d{6,}[A-Z]$/',
                'unique:data_collections,matricule'
            ]
        ], [
            'matricule.required' => 'Le matricule est obligatoire.',
            'matricule.regex' => 'Le matricule doit contenir au moins 6 chiffres suivis d\'une lettre majuscule (ex: 123456A).',
            'matricule.unique' => 'Ce matricule a déjà été utilisé pour soumettre des données.'
        ]);

        return redirect()->route('form.show', ['ministere' => $ministere, 'matricule' => $matricule]);
    }

    public function showForm(Ministere $ministere, string $matricule): View
    {
        // Vérifier que le matricule est valide
        if (!preg_match('/^\d{6,}[A-Z]$/', $matricule)) {
            abort(404);
        }

        // Vérifier que le matricule n'a pas déjà soumis
        if (DataCollection::where('matricule', $matricule)->exists()) {
            abort(403, 'Ce matricule a déjà soumis ses données.');
        }

        // Récupérer la configuration du formulaire
        $formConfig = FormConfig::where('ministere_id', $ministere->id)->first();

        if (!$formConfig) {
            abort(404, 'Aucun formulaire disponible pour ce ministère.');
        }

        // Générer un token unique pour cette soumission
        $token = Str::random(64);
        session()->put("form_token_{$ministere->id}_{$matricule}", $token);

        return view('form.show', compact('ministere', 'matricule', 'formConfig', 'token'));
    }

    public function submitForm(Request $request, Ministere $ministere, string $matricule): RedirectResponse
    {
        // Vérifier le matricule
        if (!preg_match('/^\d{6,}[A-Z]$/', $matricule)) {
            abort(404);
        }

        if (DataCollection::where('matricule', $matricule)->exists()) {
            abort(403, 'Ce matricule a déjà soumis ses données.');
        }

        // Vérifier le token anti-spam
        $tokenKey = "form_token_{$ministere->id}_{$matricule}";
        $sessionToken = session()->get($tokenKey);
        $requestToken = $request->input('_token_form');

        if (!$sessionToken || $sessionToken !== $requestToken) {
            return redirect()->back()->withErrors(['Erreur de sécurité : formulaire invalide']);
        }

        // Récupérer la config du formulaire pour validation dynamique
        $formConfig = FormConfig::where('ministere_id', $ministere->id)->first();

        if (!$formConfig) {
            abort(404);
        }

        // Construire les règles de validation dynamiquement
        $rules = [];
        foreach ($formConfig->fields as $field) {
            $fieldRules = [];
            if ($field['required']) {
                $fieldRules[] = 'required';
            }
            if ($field['type'] === 'date') {
                $fieldRules[] = 'date';
            }
            if (!empty($fieldRules)) {
                $rules['form_data.' . $field['name']] = $fieldRules;
            }
        }

        $validated = $request->validate($rules);

        // Créer la soumission
        DataCollection::create([
            'matricule' => $matricule,
            'ministere_id' => $ministere->id,
            'form_data' => $validated['form_data']
        ]);

        // Nettoyer le token
        session()->forget($tokenKey);

        return redirect()->route('form.success');
    }

    public function showFormDirect(Ministere $ministere): View
    {
        // Vérifier que c'est bien le CFJ
        if ($ministere->code !== 'CFJ') {
            abort(403, 'Accès non autorisé');
        }

        // Récupérer la configuration du formulaire
        $formConfig = FormConfig::where('ministere_id', $ministere->id)->first();

        if (!$formConfig) {
            abort(404, 'Aucun formulaire disponible pour ce ministère.');
        }

        // Générer un token unique pour cette soumission
        $token = Str::random(64);
        session()->put("form_token_cfj_{$token}", $token);

        return view('form.show-direct', compact('ministere', 'formConfig', 'token'));
    }

    public function submitFormDirect(Request $request, Ministere $ministere): RedirectResponse
    {
        // Vérifier que c'est bien le CFJ
        if ($ministere->code !== 'CFJ') {
            abort(403, 'Accès non autorisé');
        }

        // Récupérer la config du formulaire
        $formConfig = FormConfig::where('ministere_id', $ministere->id)->first();

        if (!$formConfig) {
            abort(404);
        }

        // Construire les règles de validation
        $rules = [];
        foreach ($formConfig->fields as $field) {
            $fieldRules = [];
            if ($field['required']) {
                $fieldRules[] = 'required';
            }
            if ($field['type'] === 'date') {
                $fieldRules[] = 'date';
            }
            if (!empty($fieldRules)) {
                $rules['form_data.' . $field['name']] = $fieldRules;
            }
        }

        $validated = $request->validate($rules);

        // Vérifier l'unicité Prénom+Nom pour le CFJ
        $existingRecord = DataCollection::where('ministere_id', $ministere->id)
            ->whereJsonContains('form_data->prenom', $validated['form_data']['prenom'])
            ->whereJsonContains('form_data->nom', $validated['form_data']['nom'])
            ->first();

        if ($existingRecord) {
            return redirect()->back()
                ->withErrors(['Ce sortant a déjà été enregistré'])
                ->withInput();
        }

        // Vérifier le token
        $requestToken = $request->input('_token_form');
        $found = false;
        foreach (session()->all() as $key => $value) {
            if (str_starts_with($key, 'form_token_cfj_') && $value === $requestToken) {
                $found = true;
                session()->forget($key);
                break;
            }
        }

        if (!$found) {
            return redirect()->back()->withErrors(['Erreur de sécurité : formulaire invalide']);
        }

        // Créer la soumission (matricule = NULL)
        DataCollection::create([
            'matricule' => null,
            'ministere_id' => $ministere->id,
            'form_data' => $validated['form_data']
        ]);

        return redirect()->route('form.success');
    }

    public function success(): View
    {
        return view('form.success');
    }
}
