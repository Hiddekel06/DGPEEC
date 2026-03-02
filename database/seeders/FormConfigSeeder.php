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
                'direction_id' => null,
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

        // Configurations pour les directions du MFP
        $mfpMinistere = Ministere::where('code', 'MFP')->first();
        
        if ($mfpMinistere) {
            // FormConfig pour DSI
            $dsi = \App\Models\Direction::where('code', 'DSI')->first();
            if ($dsi) {
                FormConfig::create([
                    'ministere_id' => $mfpMinistere->id,
                    'direction_id' => $dsi->id,
                    'fields' => [
                        // Tableau 1 : Format
                        ['name' => 'dsi_t1_physique_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_1', 'table_label' => 'Répartition du nombre d’actes mis en ligne format et le nombre d’agents en 2025', 'row_key' => 'physique', 'row_label' => 'Physique', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t1_physique_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_1', 'table_label' => 'Répartition du nombre d’actes mis en ligne format et le nombre d’agents en 2025', 'row_key' => 'physique', 'row_label' => 'Physique', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t1_electronique_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_1', 'table_label' => 'Répartition du nombre d’actes mis en ligne format et le nombre d’agents en 2025', 'row_key' => 'electronique', 'row_label' => 'Electronique', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t1_electronique_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_1', 'table_label' => 'Répartition du nombre d’actes mis en ligne format et le nombre d’agents en 2025', 'row_key' => 'electronique', 'row_label' => 'Electronique', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t1_total_actes', 'type' => 'number', 'required' => false, 'table' => 'tableau_1', 'table_label' => 'Répartition du nombre d’actes mis en ligne format et le nombre d’agents en 2025', 'row_key' => 'total', 'row_label' => 'Total', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'total'],
                        ['name' => 'dsi_t1_total_agents', 'type' => 'number', 'required' => false, 'table' => 'tableau_1', 'table_label' => 'Répartition du nombre d’actes mis en ligne format et le nombre d’agents en 2025', 'row_key' => 'total', 'row_label' => 'Total', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'total'],

                        // Tableau 2 : Statut / cadre
                        ['name' => 'dsi_t2_enseignement_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_2', 'table_label' => 'Répartition du nombre d’actes mis en ligne selon le statut ou le cadre', 'row_key' => 'enseignement', 'row_label' => 'Fonctionnaires de l\'enseignement', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t2_enseignement_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_2', 'table_label' => 'Répartition du nombre d’actes mis en ligne selon le statut ou le cadre', 'row_key' => 'enseignement', 'row_label' => 'Fonctionnaires de l\'enseignement', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t2_autres_fonctionnaires_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_2', 'table_label' => 'Répartition du nombre d’actes mis en ligne selon le statut ou le cadre', 'row_key' => 'autres_fonctionnaires', 'row_label' => 'Autres agents fonctionnaires de l\'Etat', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t2_autres_fonctionnaires_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_2', 'table_label' => 'Répartition du nombre d’actes mis en ligne selon le statut ou le cadre', 'row_key' => 'autres_fonctionnaires', 'row_label' => 'Autres agents fonctionnaires de l\'Etat', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t2_non_fonctionnaires_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_2', 'table_label' => 'Répartition du nombre d’actes mis en ligne selon le statut ou le cadre', 'row_key' => 'non_fonctionnaires', 'row_label' => 'Agents non fonctionnaire de l\'Etat', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t2_non_fonctionnaires_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_2', 'table_label' => 'Répartition du nombre d’actes mis en ligne selon le statut ou le cadre', 'row_key' => 'non_fonctionnaires', 'row_label' => 'Agents non fonctionnaire de l\'Etat', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t2_total_actes', 'type' => 'number', 'required' => false, 'table' => 'tableau_2', 'table_label' => 'Répartition du nombre d’actes mis en ligne selon le statut ou le cadre', 'row_key' => 'total', 'row_label' => 'Total', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'total'],
                        ['name' => 'dsi_t2_total_agents', 'type' => 'number', 'required' => false, 'table' => 'tableau_2', 'table_label' => 'Répartition du nombre d’actes mis en ligne selon le statut ou le cadre', 'row_key' => 'total', 'row_label' => 'Total', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'total'],

                        // Tableau 3 : Objet d'actes
                        ['name' => 'dsi_t3_validation_anciennete_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'validation_anciennete', 'row_label' => 'Validation d\'ancienneté', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_validation_anciennete_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'validation_anciennete', 'row_label' => 'Validation d\'ancienneté', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_avancement_grade_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'avancement_grade', 'row_label' => 'Avancement de grade', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_avancement_grade_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'avancement_grade', 'row_label' => 'Avancement de grade', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_nomination_titularisation_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'nomination_titularisation', 'row_label' => 'Nomination et titularisation', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_nomination_titularisation_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'nomination_titularisation', 'row_label' => 'Nomination et titularisation', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_avancement_echelon_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'avancement_echelon', 'row_label' => 'Avancement d\'échelon', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_avancement_echelon_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'avancement_echelon', 'row_label' => 'Avancement d\'échelon', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_engagement_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'engagement', 'row_label' => 'Engagement', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_engagement_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'engagement', 'row_label' => 'Engagement', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_regularisation_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'regularisation', 'row_label' => 'Régularisation', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_regularisation_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'regularisation', 'row_label' => 'Régularisation', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_nomination_reclassement_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'nomination_reclassement', 'row_label' => 'Nomination et reclassement', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_nomination_reclassement_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'nomination_reclassement', 'row_label' => 'Nomination et reclassement', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_reclassement_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'reclassement', 'row_label' => 'Reclassement', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_reclassement_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'reclassement', 'row_label' => 'Reclassement', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_rectificatif_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'rectificatif', 'row_label' => 'Rectificatif', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_rectificatif_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'rectificatif', 'row_label' => 'Rectificatif', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_disponibilite_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'disponibilite', 'row_label' => 'Disponibilité', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_disponibilite_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'disponibilite', 'row_label' => 'Disponibilité', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_detachement_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'detachement', 'row_label' => 'Détachement', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_detachement_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'detachement', 'row_label' => 'Détachement', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_renouvellement_disponibilite_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'renouvellement_disponibilite', 'row_label' => 'Renouvellement de disponibilité', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_renouvellement_disponibilite_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'renouvellement_disponibilite', 'row_label' => 'Renouvellement de disponibilité', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_integration_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'integration', 'row_label' => 'Intégration', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_integration_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'integration', 'row_label' => 'Intégration', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_renouvellement_detachement_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'renouvellement_detachement', 'row_label' => 'Renouvellement de détachement', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_renouvellement_detachement_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'renouvellement_detachement', 'row_label' => 'Renouvellement de détachement', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_suspension_engagement_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'suspension_engagement', 'row_label' => 'Suspension d\'engagement', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t3_suspension_engagement_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'suspension_engagement', 'row_label' => 'Suspension d\'engagement', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t3_total_general_actes', 'type' => 'number', 'required' => false, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'total_general', 'row_label' => 'Total général', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'total'],
                        ['name' => 'dsi_t3_total_general_agents', 'type' => 'number', 'required' => false, 'table' => 'tableau_3', 'table_label' => 'Répartition du nombre d’actes selon l’objet', 'row_key' => 'total_general', 'row_label' => 'Total général', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'total'],

                        // Tableau 4 : Nature des actes
                        ['name' => 'dsi_t4_arrete_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_4', 'table_label' => 'Répartition des actes d’administration selon leur nature', 'row_key' => 'arrete', 'row_label' => 'Arrêté', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t4_arrete_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_4', 'table_label' => 'Répartition des actes d’administration selon leur nature', 'row_key' => 'arrete', 'row_label' => 'Arrêté', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t4_decision_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_4', 'table_label' => 'Répartition des actes d’administration selon leur nature', 'row_key' => 'decision', 'row_label' => 'Décision', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t4_decision_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_4', 'table_label' => 'Répartition des actes d’administration selon leur nature', 'row_key' => 'decision', 'row_label' => 'Décision', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t4_decret_actes', 'type' => 'number', 'required' => true, 'table' => 'tableau_4', 'table_label' => 'Répartition des actes d’administration selon leur nature', 'row_key' => 'decret', 'row_label' => 'Décret', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'item'],
                        ['name' => 'dsi_t4_decret_agents', 'type' => 'number', 'required' => true, 'table' => 'tableau_4', 'table_label' => 'Répartition des actes d’administration selon leur nature', 'row_key' => 'decret', 'row_label' => 'Décret', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'item'],
                        ['name' => 'dsi_t4_total_actes', 'type' => 'number', 'required' => false, 'table' => 'tableau_4', 'table_label' => 'Répartition des actes d’administration selon leur nature', 'row_key' => 'total', 'row_label' => 'Total', 'metric' => 'actes', 'metric_label' => 'Nombre d’actes', 'role' => 'total'],
                        ['name' => 'dsi_t4_total_agents', 'type' => 'number', 'required' => false, 'table' => 'tableau_4', 'table_label' => 'Répartition des actes d’administration selon leur nature', 'row_key' => 'total', 'row_label' => 'Total', 'metric' => 'agents', 'metric_label' => 'Nombre d’agents concernés', 'role' => 'total'],
                    ]
                ]);
            }

            // FormConfig pour DELC
            $delc = \App\Models\Direction::where('code', 'DELC')->first();
            if ($delc) {
                FormConfig::create([
                    'ministere_id' => $mfpMinistere->id,
                    'direction_id' => $delc->id,
                    'fields' => [
                        // Section 1 : Sanctions du conseil de discipline
                        ['name' => 'delc_section_1_heading', 'type' => 'heading', 'label' => 'Les sanctions prononcées à la suite de la saisine du conseil de discipline', 'repeatable_group' => null],
                        
                        ['name' => 'delc_sanction_corps_0', 'type' => 'text', 'label' => 'Corps ou Emplois', 'required' => true, 'repeatable_group' => 'sanctions', 'table' => 'delc_sanction_lines'],
                        ['name' => 'delc_sanction_sexe_0', 'type' => 'select', 'label' => 'Sexe', 'required' => true, 'repeatable_group' => 'sanctions', 'table' => 'delc_sanction_lines', 'options' => ['M' => 'Masculin', 'F' => 'Féminin']],
                        ['name' => 'delc_sanction_sanction_0', 'type' => 'text', 'label' => 'Sanction', 'required' => true, 'repeatable_group' => 'sanctions', 'table' => 'delc_sanction_lines'],
                        ['name' => 'delc_sanction_motif_0', 'type' => 'textarea', 'label' => 'Motif', 'required' => false, 'repeatable_group' => 'sanctions', 'table' => 'delc_sanction_lines'],

                        // Section 2 : Gestion du contentieux
                        ['name' => 'delc_section_2_heading', 'type' => 'heading', 'label' => 'Gestion du contentieux - Les actes pris suite au traitement des dossiers de contentieux', 'repeatable_group' => null],
                        
                        ['name' => 'delc_contentieux_corps_0', 'type' => 'text', 'label' => 'Corps ou Emplois', 'required' => true, 'repeatable_group' => 'contentieux', 'table' => 'delc_contentieux_lines'],
                        ['name' => 'delc_contentieux_sexe_0', 'type' => 'select', 'label' => 'Sexe', 'required' => true, 'repeatable_group' => 'contentieux', 'table' => 'delc_contentieux_lines', 'options' => ['M' => 'Masculin', 'F' => 'Féminin']],
                        ['name' => 'delc_contentieux_sanction_0', 'type' => 'text', 'label' => 'Sanction', 'required' => true, 'repeatable_group' => 'contentieux', 'table' => 'delc_contentieux_lines'],
                        ['name' => 'delc_contentieux_motif_0', 'type' => 'textarea', 'label' => 'Motif', 'required' => false, 'repeatable_group' => 'contentieux', 'table' => 'delc_contentieux_lines'],

                        // Section 3 : Demandes de reconnaissance
                        ['name' => 'delc_section_3_heading', 'type' => 'heading', 'label' => 'Les demandes de reconnaissance, de classement et d\'équivalence reçues', 'repeatable_group' => null],
                        
                        ['name' => 'delc_diplome_diplome_0', 'type' => 'text', 'label' => 'Diplôme', 'required' => true, 'repeatable_group' => 'diplomes', 'table' => 'delc_diplome_lines'],
                        ['name' => 'delc_diplome_nb_demandes_0', 'type' => 'number', 'label' => 'Nombre de demandes de classement reçues', 'required' => false, 'repeatable_group' => 'diplomes', 'table' => 'delc_diplome_lines'],
                        ['name' => 'delc_diplome_nb_attestations_0', 'type' => 'number', 'label' => 'Nombre d\'attestations de classement délivré', 'required' => false, 'repeatable_group' => 'diplomes', 'table' => 'delc_diplome_lines'],
                        ['name' => 'delc_diplome_nb_lettres_0', 'type' => 'number', 'label' => 'Nombre de lettres de non classement de diplôme', 'required' => false, 'repeatable_group' => 'diplomes', 'table' => 'delc_diplome_lines'],
                        ['name' => 'delc_diplome_motif_0', 'type' => 'textarea', 'label' => 'Motif de non classement du diplôme', 'required' => false, 'repeatable_group' => 'diplomes', 'table' => 'delc_diplome_lines'],
                        ['name' => 'delc_diplome_avec_equivalence_0', 'type' => 'number', 'label' => 'Avec équivalence', 'required' => false, 'repeatable_group' => 'diplomes', 'table' => 'delc_diplome_lines'],
                        ['name' => 'delc_diplome_sans_equivalence_0', 'type' => 'number', 'label' => 'Sans équivalence', 'required' => false, 'repeatable_group' => 'diplomes', 'table' => 'delc_diplome_lines'],
                    ]
                ]);
            }

            // FormConfig pour DGC
            $dgc = \App\Models\Direction::where('code', 'DGC')->first();
            if ($dgc) {
                FormConfig::create([
                    'ministere_id' => $mfpMinistere->id,
                    'direction_id' => $dgc->id,
                    'fields' => [
                        // Champs temporaires - à remplacer plus tard
                        ['name' => 'prenom', 'label' => 'Prénom', 'type' => 'text', 'required' => true],
                        ['name' => 'nom', 'label' => 'Nom', 'type' => 'text', 'required' => true],
                        ['name' => 'commentaire', 'label' => 'Commentaire DGC', 'type' => 'textarea', 'required' => false],
                    ]
                ]);
            }
        }
    }
}
