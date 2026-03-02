<?php

namespace Database\Seeders;

use App\Models\AuthorizedAgent;
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
        // Agent pour MFP
        $mfpMinistere = Ministere::where('code', 'MFP')->first();
        if ($mfpMinistere) {
            AuthorizedAgent::create([
                'ministere_id' => $mfpMinistere->id,
                'email' => 'admin@mfp.ci',
                'password' => Hash::make('passer1234'),
            ]);
        }

        // Agent pour BOM
        $bomMinistere = Ministere::where('code', 'BOM')->first();
        if ($bomMinistere) {
            AuthorizedAgent::create([
                'ministere_id' => $bomMinistere->id,
                'email' => 'admin@bom.ci',
                'password' => Hash::make('bom1234'),
            ]);
        }
    }
}
