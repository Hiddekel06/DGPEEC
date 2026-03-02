<?php

namespace Database\Seeders;

use App\Models\AuthorizedAgent;
use App\Models\Direction;
use App\Models\Ministere;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthorizedAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Agent pour BOM
        $bomMinistere = Ministere::where('code', 'BOM')->first();
        if ($bomMinistere) {
            AuthorizedAgent::create([
                'ministere_id' => $bomMinistere->id,
                'direction_id' => null, // BOM n'a pas de directions
                'email' => 'admin@bom.ci',
                'password' => Hash::make('bom1234'),
            ]);
        }

        // Agents pour les directions du MFP
        $mfpMinistere = Ministere::where('code', 'MFP')->first();
        
        if ($mfpMinistere) {
            // Agent DSI
            $dsi = Direction::where('code', 'DSI')->first();
            if ($dsi) {
                AuthorizedAgent::create([
                    'ministere_id' => $mfpMinistere->id,
                    'direction_id' => $dsi->id,
                    'email' => 'admin@dsi.mfp',
                    'password' => Hash::make('dsi1234'),
                ]);
            }

            // Agent DELC
            $delc = Direction::where('code', 'DELC')->first();
            if ($delc) {
                AuthorizedAgent::create([
                    'ministere_id' => $mfpMinistere->id,
                    'direction_id' => $delc->id,
                    'email' => 'admin@delc.mfp',
                    'password' => Hash::make('delc1234'),
                ]);
            }

            // Agent DGC
            $dgc = Direction::where('code', 'DGC')->first();
            if ($dgc) {
                AuthorizedAgent::create([
                    'ministere_id' => $mfpMinistere->id,
                    'direction_id' => $dgc->id,
                    'email' => 'admin@dgc.mfp',
                    'password' => Hash::make('dgc1234'),
                ]);
            }
        }
    }
}
