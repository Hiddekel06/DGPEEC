<?php

namespace Database\Seeders;

use App\Models\FormConfig;
use App\Models\Ministere;
use Illuminate\Database\Seeder;

class FormConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Configuration pour le ministère "Autre"
        $autreMinistere = Ministere::where('code', 'AUTRE')->first();

        if ($autreMinistere) {
            FormConfig::create([
                'ministere_id' => $autreMinistere->id,
                'fields' => [
                    ['name' => 'prenom', 'label' => 'Prénom', 'type' => 'text', 'required' => true],
                    ['name' => 'nom', 'label' => 'Nom', 'type' => 'text', 'required' => true],
                    ['name' => 'sexe', 'label' => 'Sexe', 'type' => 'select', 'required' => true, 'options' => ['M' => 'Masculin', 'F' => 'Féminin']],
                    ['name' => 'date_naissance', 'label' => 'Date de naissance', 'type' => 'date', 'required' => true],
                    ['name' => 'corps_emplois', 'label' => 'Corps ou Emplois', 'type' => 'text', 'required' => true],
                    ['name' => 'hierarchie', 'label' => 'Hiérarchie', 'type' => 'text', 'required' => true],
                    ['name' => 'fonction', 'label' => 'Fonction', 'type' => 'text', 'required' => true],
                    ['name' => 'statut', 'label' => 'Statut', 'type' => 'select', 'required' => true, 'options' => ['fonctionnaire' => 'Fonctionnaire', 'non-fonctionnaire' => 'Non-fonctionnaire']],
                    ['name' => 'position_sortie', 'label' => 'Position de sortie', 'type' => 'select', 'required' => false, 'options' => [
                        'actif' => 'Actif',
                        'detachement' => 'Détachement',
                        'disponibilite' => 'Disponibilité',
                        'suspension' => 'Suspension d\'engagement',
                        'demission' => 'Démission',
                        'deces' => 'Décès',
                        'retraite' => 'Retraite',
                        'radiation' => 'Radiation/Licenciement'
                    ]],
                    ['name' => 'service', 'label' => 'Service', 'type' => 'text', 'required' => true],
                    ['name' => 'departement', 'label' => 'Département', 'type' => 'text', 'required' => true],
                    ['name' => 'region', 'label' => 'Région', 'type' => 'text', 'required' => true],
                ]
            ]);
        }

        // Configuration pour le Centre de Formation Judiciaire
        $cfjMinistere = Ministere::where('code', 'CFJ')->first();

        if ($cfjMinistere) {
            FormConfig::create([
                'ministere_id' => $cfjMinistere->id,
                'fields' => [
                    ['name' => 'prenom', 'label' => 'Prénom', 'type' => 'text', 'required' => true],
                    ['name' => 'nom', 'label' => 'Nom', 'type' => 'text', 'required' => true],
                    ['name' => 'voie_acces', 'label' => 'Voie d\'accès', 'type' => 'text', 'required' => true],
                    ['name' => 'section', 'label' => 'Section', 'type' => 'text', 'required' => true],
                    ['name' => 'corps', 'label' => 'Corps', 'type' => 'text', 'required' => true],
                    ['name' => 'hierarchie_sortie', 'label' => 'Hiérarchie de sortie', 'type' => 'text', 'required' => true],
                ]
            ]);
        }

        // Configuration pour les sortants de l’ENA
        $enaMinistere = Ministere::where('code', 'ENA')->first();

        if ($enaMinistere) {
            FormConfig::create([
                'ministere_id' => $enaMinistere->id,
                'fields' => [
                    ['name' => 'prenom', 'label' => 'Prénom', 'type' => 'text', 'required' => true],
                    ['name' => 'nom', 'label' => 'Nom', 'type' => 'text', 'required' => true],
                    ['name' => 'voie_acces', 'label' => 'Voie d\'accès', 'type' => 'select', 'required' => true, 'options' => [
                        'concours_direct' => 'Concours direct',
                        'professionnel' => 'Professionnel',
                    ]],
                    ['name' => 'section', 'label' => 'Section', 'type' => 'text', 'required' => true],
                    ['name' => 'corps', 'label' => 'Corps', 'type' => 'text', 'required' => true],
                    ['name' => 'hierarchie_sortie', 'label' => 'Hiérarchie de sortie', 'type' => 'text', 'required' => true],
                ]
            ]);
        }
    }
}
