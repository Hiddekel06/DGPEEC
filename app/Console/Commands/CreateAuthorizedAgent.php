<?php

namespace App\Console\Commands;

use App\Models\AuthorizedAgent;
use App\Models\Ministere;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAuthorizedAgent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agent:create {--ministere=} {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créer un agent autorisé pour l\'authentification d\'un ministère';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Récupérer ou demander le code du ministère
        $ministereCode = $this->option('ministere') ?: $this->ask('Code du ministère (ex: MFP, BOM)');
        
        $ministere = Ministere::where('code', strtoupper($ministereCode))->first();
        
        if (!$ministere) {
            $this->error("Ministère avec le code '{$ministereCode}' non trouvé.");
            return 1;
        }

        if (!$ministere->requires_authentication) {
            $this->error("Le ministère '{$ministere->name}' n'a pas besoin d'authentification.");
            return 1;
        }

        // Récupérer ou demander l'email
        $email = $this->option('email') ?: $this->ask('Email');

        // Vérifier que l'email n'existe pas déjà
        if (AuthorizedAgent::where('email', $email)->exists()) {
            $this->error("Un agent avec l'email '{$email}' existe déjà.");
            return 1;
        }

        // Récupérer ou demander le mot de passe
        $password = $this->option('password') ?: $this->secret('Mot de passe');

        if (strlen($password) < 6) {
            $this->error('Le mot de passe doit contenir au moins 6 caractères.');
            return 1;
        }

        // Créer l'agent autorisé
        AuthorizedAgent::create([
            'ministere_id' => $ministere->id,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("Agent autorisé créé avec succès !");
        $this->info("Ministère: {$ministere->name}");
        $this->info("Email: {$email}");

        return 0;
    }
}
