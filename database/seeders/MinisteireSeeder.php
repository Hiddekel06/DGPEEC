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
        // Mettre à jour ou créer le ministère parent (utiliser le nom comme clé unique)
        $minfp = Ministere::updateOrCreate(
            ['name' => 'Ministère de la Fonction Publique'],
            [
                'code' => 'MFPTRSP',
                'description' => 'Sélectionnez une division',
                'requires_authentication' => false,
                'parent_id' => null,
            ]
        );

        // Créer les divisions enfants (ou mettre à jour si existantes)
        Ministere::updateOrCreate(
            ['code' => 'DSI'],
            [
                'name' => 'DSI',
                'description' => null,
                'requires_authentication' => false,
                'parent_id' => $minfp->id,
            ]
        );

        Ministere::updateOrCreate(
            ['code' => 'DELC'],
            [
                'name' => 'DELC',
                'description' => null,
                'requires_authentication' => false,
                'parent_id' => $minfp->id,
            ]
        );

        Ministere::updateOrCreate(
            ['code' => 'DGC'],
            [
                'name' => 'DGC',
                'description' => null,
                'requires_authentication' => false,
                'parent_id' => $minfp->id,
            ]
        );

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
            Ministere::updateOrCreate(
                ['code' => $ministere['code']],
                $ministere
            );
        }
    }
}
