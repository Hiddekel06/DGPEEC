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
        $ministeres = [
            [
                'name' => 'Ministere de la fonction publique',
                'code' => 'MFP',
                'description' => null,
                'requires_authentication' => true,
            ],
            [
                'name' => 'Ministere de l\'environnement',
                'code' => 'ME',
                'description' => null,
            ],
            [
                'name' => 'Ministere de la justice',
                'code' => 'MJ',
                'description' => null,
            ],
            [
                'name' => 'Centre de Formation Judiciaire',
                'code' => 'CFJ',
                'description' => null,
            ],
            [
                'name' => 'Sortants de l’ENA',
                'code' => 'ENA',
                'description' => null,
            ],
            [
                'name' => 'Centre national de fonction des techniciens des Eaux et Forêts, Chasses et Parcs nationaux (CNFTEFCPN)',
                'code' => 'CNFTEFCPN',
                'description' => null,
            ],
            [
                'name' => 'Recrues de l’administration pénitentiaire',
                'code' => 'APEN',
                'description' => null,
            ],
            [
                'name' => 'Ministère des finances et du budget',
                'code' => 'MFB',
                'description' => null,
            ],
            [
                'name' => 'Bureau d\'Organisation et de Méthode',
                'code' => 'BOM',
                'description' => null,
                'requires_authentication' => true,
            ],
            [
                'name' => 'Autre',
                'code' => 'AUTRE',
                'description' => 'Autre ministère',
            ],
        ];

        foreach ($ministeres as $ministere) {
            Ministere::create($ministere);
        }
    }
}
