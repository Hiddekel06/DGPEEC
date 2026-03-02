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

        // Configuration pour le Ministère des finances et du budget
        $mfbMinistere = Ministere::where('code', 'MFB')->first();

        if ($mfbMinistere) {
            FormConfig::create([
                'ministere_id' => $mfbMinistere->id,
                'fields' => [
                    ['name' => 'matricule', 'label' => 'Matricule', 'type' => 'text', 'required' => true],
                    ['name' => 'prenom', 'label' => 'Prénom', 'type' => 'text', 'required' => true],
                    ['name' => 'nom', 'label' => 'Nom', 'type' => 'text', 'required' => true],
                    ['name' => 'sexe', 'label' => 'Sexe', 'type' => 'select', 'required' => true, 'options' => ['M' => 'Masculin', 'F' => 'Féminin']],
                    ['name' => 'date_naissance', 'label' => 'Date de naissance', 'type' => 'date', 'required' => true],
                    ['name' => 'corps_emplois', 'label' => 'Corps ou Emplois', 'type' => 'text', 'required' => true],
                    ['name' => 'hierarchie', 'label' => 'Hiérarchie', 'type' => 'text', 'required' => true],
                    ['name' => 'fonction', 'label' => 'Fonction', 'type' => 'text', 'required' => true],
                    ['name' => 'statut', 'label' => 'Statut', 'type' => 'select', 'required' => true, 'options' => ['fonctionnaire' => 'Fonctionnaire', 'non-fonctionnaire' => 'Non-fonctionnaire']],
                    ['name' => 'position_sortie', 'label' => 'Position de sortie', 'type' => 'select', 'required' => false, 'options' => [
                        'detachement' => 'Détachement',
                        'disponibilite' => 'Disponibilité',
                        'suspension' => 'Suspension d\'engagement',
                        'demission' => 'Démission',
                        'deces' => 'Décès',
                        'retraite' => 'Retraite',
                        'radiation' => 'Radiation/Licenciement',
                    ]],
                    ['name' => 'ministere', 'label' => 'Ministère', 'type' => 'text', 'required' => true],
                    ['name' => 'service', 'label' => 'Service', 'type' => 'text', 'required' => true],
                    ['name' => 'departement', 'label' => 'Département', 'type' => 'text', 'required' => true],
                    ['name' => 'region', 'label' => 'Région', 'type' => 'text', 'required' => true],
                ]
            ]);
        }

        // Configuration pour le ministère de l'Environnement
        $environnementMinistere = Ministere::where('code', 'ME')->first();

        if ($environnementMinistere) {
            FormConfig::create([
                'ministere_id' => $environnementMinistere->id,
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

        // Configuration pour le Ministère de la Justice
        $justiceMinistere = Ministere::where('code', 'MJ')->first();

        if ($justiceMinistere) {
            FormConfig::create([
                'ministere_id' => $justiceMinistere->id,
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

        // Configuration pour les sortants du CNFTEFCPN
        $cnftefcpnMinistere = Ministere::where('code', 'CNFTEFCPN')->first();

        if ($cnftefcpnMinistere) {
            FormConfig::create([
                'ministere_id' => $cnftefcpnMinistere->id,
                'fields' => [
                    ['name' => 'prenom', 'label' => 'Prénom', 'type' => 'text', 'required' => true],
                    ['name' => 'nom', 'label' => 'Nom', 'type' => 'text', 'required' => true],
                    ['name' => 'sexe', 'label' => 'Sexe', 'type' => 'select', 'required' => true, 'options' => ['M' => 'Masculin', 'F' => 'Féminin']],
                    ['name' => 'section', 'label' => 'Section', 'type' => 'text', 'required' => true],
                    ['name' => 'voie', 'label' => 'Voie', 'type' => 'select', 'required' => true, 'options' => [
                        'concours_direct' => 'Concours direct',
                        'professionnel' => 'Professionnel',
                    ]],
                ]
            ]);
        }

        // Configuration pour les recrues de l’administration pénitentiaire
        $apenMinistere = Ministere::where('code', 'APEN')->first();

        if ($apenMinistere) {
            FormConfig::create([
                'ministere_id' => $apenMinistere->id,
                'fields' => [
                    ['name' => 'prenom', 'label' => 'Prénom', 'type' => 'text', 'required' => true],
                    ['name' => 'nom', 'label' => 'Nom', 'type' => 'text', 'required' => true],
                    ['name' => 'sexe', 'label' => 'Sexe', 'type' => 'select', 'required' => true, 'options' => ['M' => 'Masculin', 'F' => 'Féminin']],
                    ['name' => 'section', 'label' => 'Section', 'type' => 'text', 'required' => true],
                ]
            ]);
        }

        // Configuration pour le Bureau d'Organisation et de Méthode (BOM)
        $bomMinistere = Ministere::where('code', 'BOM')->first();

        if ($bomMinistere) {
            FormConfig::create([
                'ministere_id' => $bomMinistere->id,
                'fields' => [
                    // Présidence de la République
                    ['name' => 'presidence_demandes', 'label' => 'Présidence de la République', 'sublabel' => 'Nombre de demandes reçues', 'type' => 'number', 'required' => true, 'structure' => 'presidence'],
                    ['name' => 'presidence_bourses', 'label' => 'Présidence de la République', 'sublabel' => 'Nombre de bourses accordés', 'type' => 'number', 'required' => true, 'structure' => 'presidence'],
                    ['name' => 'presidence_montant', 'label' => 'Présidence de la République', 'sublabel' => 'Montant', 'type' => 'number', 'required' => true, 'structure' => 'presidence'],
                    
                    // Primature
                    ['name' => 'primature_demandes', 'label' => 'Primature', 'sublabel' => 'Nombre de demandes reçues', 'type' => 'number', 'required' => true, 'structure' => 'primature'],
                    ['name' => 'primature_bourses', 'label' => 'Primature', 'sublabel' => 'Nombre de bourses accordés', 'type' => 'number', 'required' => true, 'structure' => 'primature'],
                    ['name' => 'primature_montant', 'label' => 'Primature', 'sublabel' => 'Montant', 'type' => 'number', 'required' => true, 'structure' => 'primature'],
                    
                    // Ministères
                    ['name' => 'ministeres_demandes', 'label' => 'Ministères', 'sublabel' => 'Nombre de demandes reçues', 'type' => 'number', 'required' => true, 'structure' => 'ministeres'],
                    ['name' => 'ministeres_bourses', 'label' => 'Ministères', 'sublabel' => 'Nombre de bourses accordés', 'type' => 'number', 'required' => true, 'structure' => 'ministeres'],
                    ['name' => 'ministeres_montant', 'label' => 'Ministères', 'sublabel' => 'Montant', 'type' => 'number', 'required' => true, 'structure' => 'ministeres'],
                    
                    // Total
                    ['name' => 'total_demandes', 'label' => 'Total', 'sublabel' => 'Nombre de demandes reçues', 'type' => 'number', 'required' => true, 'structure' => 'total'],
                    ['name' => 'total_bourses', 'label' => 'Total', 'sublabel' => 'Nombre de bourses accordés', 'type' => 'number', 'required' => true, 'structure' => 'total'],
                    ['name' => 'total_montant', 'label' => 'Total', 'sublabel' => 'Montant', 'type' => 'number', 'required' => true, 'structure' => 'total'],
                ]
            ]);
        }
    }
}
