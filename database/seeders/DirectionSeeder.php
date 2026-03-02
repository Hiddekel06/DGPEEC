<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\Ministere;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Directions pour MFP
        $mfpMinistere = Ministere::where('code', 'MFP')->first();

        if ($mfpMinistere) {
            Direction::create([
                'ministere_id' => $mfpMinistere->id,
                'name' => 'Direction de la Stratégie et des Innovations (DSI)',
                'code' => 'DSI',
                'description' => 'Gère la stratégie et les innovations du ministère',
            ]);

            Direction::create([
                'ministere_id' => $mfpMinistere->id,
                'name' => 'Direction de l\'Emploi, de la Libre Circulation et de la Communication (DELC)',
                'code' => 'DELC',
                'description' => 'Gère l\'emploi, la circulation et la communication',
            ]);

            Direction::create([
                'ministere_id' => $mfpMinistere->id,
                'name' => 'Direction de la Gestion et du Contrôle (DGC)',
                'code' => 'DGC',
                'description' => 'Gère et contrôle les opérations',
            ]);
        }
    }
}
