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
        ];

        foreach ($ministeres as $ministere) {
            Ministere::create($ministere);
        }
    }
}
