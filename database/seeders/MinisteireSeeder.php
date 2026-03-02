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
                'name' => 'Ministere fonction publique',
                'code' => 'MFP',
                'description' => null,
            ],
            [
                'name' => 'Ministere environnement',
                'code' => 'ME',
                'description' => null,
            ],
            [
                'name' => 'Ministere justice',
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
