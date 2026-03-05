<?php

namespace Database\Seeders;

use App\Models\Ministere;
use Illuminate\Database\Seeder;

class MinisteireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer d'abord le ministère parent
        $minfp = Ministere::create([
            'name' => 'Ministère de la Fonction Publique',
            'code' => 'MFPTRSP',
            'description' => 'Sélectionnez une division',
            'requires_authentication' => false,
            'parent_id' => null,
        ]);

        // Créer les divisions enfants
        Ministere::create([
            'name' => 'Direction de la Stratégie Informatique',
            'code' => 'DSI',
            'description' => 'Division DSI',
            'requires_authentication' => false,
            'parent_id' => $minfp->id,
        ]);

        Ministere::create([
            'name' => 'DELC',
            'code' => 'DELC',
            'description' => 'Division DELC',
            'requires_authentication' => false,
            'parent_id' => $minfp->id,
        ]);

        Ministere::create([
            'name' => 'DGC',
            'code' => 'DGC',
            'description' => 'Division DGC',
            'requires_authentication' => false,
            'parent_id' => $minfp->id,
        ]);

        // Autres ministères
        $ministeres = [
            [
                'name' => 'Ministere de l\'environnement',
                'code' => 'ME',
                'description' => null,
                'requires_authentication' => false,
            ],
            [
                'name' => 'Ministere de la justice',
                'code' => 'MJ',
                'description' => null,
                'requires_authentication' => false,
            ],
            [
                'name' => 'Centre de Formation Judiciaire',
                'code' => 'CFJ',
                'description' => null,
                'requires_authentication' => false,
            ],
            [
                'name' => 'Ecole Nationale d\'Administration',
                'code' => 'ENA',
                'description' => null,
                'requires_authentication' => false,
            ],
            [
                'name' => 'Centre national de fonction des techniciens des Eaux et Forêts, Chasses et Parcs nationaux (CNFTEFCPN)',
                'code' => 'CNFTEFCPN',
                'description' => null,
                'requires_authentication' => false,
            ],
            [
                'name' => 'Recrues de l\'administration pénitentiaire',
                'code' => 'APEN',
                'description' => null,
                'requires_authentication' => false,
            ],
            [
                'name' => 'Ministère des finances et du budget',
                'code' => 'MFB',
                'description' => null,
                'requires_authentication' => false,
            ],
            [
                'name' => 'BOM',
                'code' => 'BOM',
                'description' => null,
                'requires_authentication' => true,
            ],
            [
                'name' => 'Autres Administrations',
                'code' => 'AUTRE',
                'description' => 'Autre administration ',
                'requires_authentication' => false,
            ],
        ];

        foreach ($ministeres as $ministere) {
            Ministere::create($ministere);
        }
    }
}
