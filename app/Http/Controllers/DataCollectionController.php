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
    public function showForm(Ministere $ministere): View
    {
        // Vérifier si l'agent appartient à une direction
        $directionId = session()->get("agent_direction_{$ministere->id}");
        
        // Récupérer la configuration du formulaire
        if ($directionId) {
            // Charger le formulaire spécifique à la direction
            $formConfig = FormConfig::where('ministere_id', $ministere->id)
                                    ->where('direction_id', $directionId)
                                    ->first();
        } else {
            // Charger le formulaire général du ministère
            $formConfig = FormConfig::where('ministere_id', $ministere->id)
                                    ->whereNull('direction_id')
                                    ->first();
        }

        if (!$formConfig) {
            abort(404, 'Aucun formulaire disponible pour ce ministère.');
        }

        // Générer un token unique pour cette soumission
        $token = Str::random(64);
        session()->put("form_token_{$ministere->id}", $token);

        return view('form.show', compact('ministere', 'formConfig', 'token'));
    }

    public function submitForm(Request $request, Ministere $ministere): RedirectResponse
    {
        // Vérifier le token anti-spam
        $tokenKey = "form_token_{$ministere->id}";
        $sessionToken = session()->get($tokenKey);
        $requestToken = $request->input('_token_form');

        if (!$sessionToken || $sessionToken !== $requestToken) {
            return redirect()->back()->withErrors(['Erreur de sécurité : formulaire invalide']);
        }

        // Vérifier si l'agent appartient à une direction
        $directionId = session()->get("agent_direction_{$ministere->id}");
        
        // Récupérer la config du formulaire pour validation dynamique
        if ($directionId) {
            $formConfig = FormConfig::where('ministere_id', $ministere->id)
                                    ->where('direction_id', $directionId)
                                    ->first();
        } else {
            $formConfig = FormConfig::where('ministere_id', $ministere->id)
                                    ->whereNull('direction_id')
                                    ->first();
        }

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
            if ($field['type'] === 'number') {
                $fieldRules[] = 'integer';
                $fieldRules[] = 'min:0';
            }
            if ($field['type'] === 'date') {
                $fieldRules[] = 'date';
            }
            // Validation spéciale pour le matricule
            if ($field['name'] === 'matricule') {
                $fieldRules[] = 'regex:/^\d{6,}[A-Z]$/';
                $fieldRules[] = 'unique:data_collections,matricule';
            }
            if (!empty($fieldRules)) {
                $rules['form_data.' . $field['name']] = $fieldRules;
            }
        }

        $validated = $request->validate($rules, [
            'form_data.matricule.regex' => 'Le matricule doit contenir au moins 6 chiffres suivis d\'une lettre majuscule (ex: 123456A).',
            'form_data.matricule.unique' => 'Ce matricule a déjà été utilisé pour soumettre des données.',
            'form_data.*.integer' => 'Les champs numériques doivent contenir des entiers.',
            'form_data.*.min' => 'Les champs numériques ne peuvent pas être négatifs.',
        ]);

        $formData = $validated['form_data'] ?? [];
        $formData = $this->applyComputedTotals($formConfig->fields, $formData);

        // Normaliser le matricule si présent
        $matricule = null;
        if (isset($formData['matricule']) && filled($formData['matricule'])) {
            $matricule = strtoupper(trim($formData['matricule']));
            $formData['matricule'] = $matricule;
        }

        // Créer la soumission
        DataCollection::create([
            'matricule' => $matricule,
            'ministere_id' => $ministere->id,
            'form_data' => $formData
        ]);

        // Nettoyer le token
        session()->forget($tokenKey);

        return redirect()->route('form.success');
    }

    public function showFormDirect(Ministere $ministere): View
    {
        // Vérifier que c'est bien un ministère en flux direct
        if (!in_array($ministere->code, ['CFJ', 'CNFTEFCPN', 'APEN'], true)) {
            abort(403, 'Accès non autorisé');
        }

        // Vérifier si l'agent appartient à une direction
        $directionId = session()->get("agent_direction_{$ministere->id}");
        
        // Récupérer la configuration du formulaire
        if ($directionId) {
            $formConfig = FormConfig::where('ministere_id', $ministere->id)
                                    ->where('direction_id', $directionId)
                                    ->first();
        } else {
            $formConfig = FormConfig::where('ministere_id', $ministere->id)
                                    ->whereNull('direction_id')
                                    ->first();
        }

        if (!$formConfig) {
            abort(404, 'Aucun formulaire disponible pour ce ministère.');
        }

        // Générer un token unique pour cette soumission
        $token = Str::random(64);
        session()->put("form_token_cfj_{$token}", $token);

        $formTitle = match ($ministere->code) {
            'CFJ' => 'Les sortants du Centre de Formation Judiciaire_2025',
            'CNFTEFCPN' => 'Les sortants du Centre national de fonction des techniciens des Eaux et Forêts, Chasses et Parcs nationaux (CNFTEFCPN)',
            'APEN' => 'Les recrues de l’administration pénitentiaire',
            default => 'Formulaire de collecte 2025',
        };

        return view('form.show-direct', compact('ministere', 'formConfig', 'token', 'formTitle'));
    }

    public function submitFormDirect(Request $request, Ministere $ministere): RedirectResponse
    {
        // Vérifier que c'est bien un ministère en flux direct
        if (!in_array($ministere->code, ['CFJ', 'CNFTEFCPN', 'APEN'], true)) {
            abort(403, 'Accès non autorisé');
        }

        // Vérifier si l'agent appartient à une direction
        $directionId = session()->get("agent_direction_{$ministere->id}");
        
        // Récupérer la config du formulaire
        if ($directionId) {
            $formConfig = FormConfig::where('ministere_id', $ministere->id)
                                    ->where('direction_id', $directionId)
                                    ->first();
        } else {
            $formConfig = FormConfig::where('ministere_id', $ministere->id)
                                    ->whereNull('direction_id')
                                    ->first();
        }

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
            if ($field['type'] === 'number') {
                $fieldRules[] = 'integer';
                $fieldRules[] = 'min:0';
            }
            if ($field['type'] === 'date') {
                $fieldRules[] = 'date';
            }
            if (!empty($fieldRules)) {
                $rules['form_data.' . $field['name']] = $fieldRules;
            }
        }

        $validated = $request->validate($rules, [
            'form_data.*.integer' => 'Les champs numériques doivent contenir des entiers.',
            'form_data.*.min' => 'Les champs numériques ne peuvent pas être négatifs.',
        ]);

        $formData = $validated['form_data'] ?? [];
        $formData = $this->applyComputedTotals($formConfig->fields, $formData);

        // Vérifier l'unicité Prénom+Nom pour le CFJ
        $existingRecord = DataCollection::where('ministere_id', $ministere->id)
            ->whereJsonContains('form_data->prenom', $formData['prenom'])
            ->whereJsonContains('form_data->nom', $formData['nom'])
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
            'form_data' => $formData
        ]);

        return redirect()->route('form.success');
    }

    public function success(): View
    {
        return view('data-collections.success');
    }

    private function applyComputedTotals(array $fields, array $formData): array
    {
        $tableFields = collect($fields)->filter(fn ($field) => isset($field['table'], $field['metric'], $field['role']));

        if ($tableFields->isEmpty()) {
            return $formData;
        }

        $grouped = $tableFields->groupBy(fn ($field) => $field['table'] . '::' . $field['metric']);

        foreach ($grouped as $groupFields) {
            $sum = 0;

            foreach ($groupFields as $field) {
                if (($field['role'] ?? 'item') === 'item') {
                    $value = (int) ($formData[$field['name']] ?? 0);
                    $sum += $value;
                }
            }

            foreach ($groupFields as $field) {
                if (($field['role'] ?? 'item') === 'total') {
                    $formData[$field['name']] = $sum;
                }
            }
        }

        return $formData;
    }
}
