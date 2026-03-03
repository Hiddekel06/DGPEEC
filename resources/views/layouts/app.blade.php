<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Collecte</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-50 min-h-screen flex flex-col">

    @php
        $currentStep = trim($__env->yieldContent('progress_step'));
        $steps = [
            'ministere' => 1,
            'formulaire' => 2,
            'confirmation' => 3,
        ];
        $stepNumber = $steps[$currentStep] ?? 1;
        $progressWidth = match ($stepNumber) {
            1 => 'w-1/3',
            2 => 'w-2/3',
            3 => 'w-full',
            default => 'w-1/3',
        };
    @endphp

    <!-- Header amélioré : plus élégant, avec verre dépoli et ombre douce -->
    <header class="bg-white/80 backdrop-blur-md border-b border-white/20 shadow-sm sticky top-0 z-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo + titre -->
                <div class="flex items-center gap-4">
                    <!-- Logo MFP -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('images/MFPremove.png') }}" alt="Logo MFP" class="h-12 w-auto">
                    </div>
                    <div>
                        <h1 class="text-lg sm:text-xl font-semibold text-gray-800 tracking-tight">Ministère de la Fonction Publique</h1>
                        <p class="text-xs text-gray-500 flex items-center gap-1">
                            <span class="inline-block w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            Plateforme de Collecte 2025
                        </p>
                    </div>
                </div>

                <!-- Indicateur de progression dynamique -->
                <div class="hidden sm:flex items-center gap-3 text-xs text-gray-600">
                    <span class="font-medium {{ $stepNumber >= 1 ? 'text-green-700' : 'text-gray-400' }}">Strucure</span>
                    <span class="{{ $stepNumber >= 1 ? 'text-green-600' : 'text-gray-300' }}">●</span>
                    <span class="font-medium {{ $stepNumber >= 2 ? 'text-green-700' : 'text-gray-400' }}">Formulaire</span>
                    <span class="{{ $stepNumber >= 2 ? 'text-green-600' : 'text-gray-300' }}">●</span>
                    <span class="font-medium {{ $stepNumber >= 3 ? 'text-green-700' : 'text-gray-400' }}">Confirmation</span>
                </div>
            </div>
        </div>
        <!-- Fine barre de progression (effet visuel) -->
        <div class="h-0.5 w-full bg-gray-100">
            <div class="h-0.5 {{ $progressWidth }} bg-gradient-to-r from-green-500 to-emerald-500 rounded-r-full transition-all duration-300"></div>
        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer amélioré : plus complet et aéré, tout en restant sobre -->
    <footer class="bg-gradient-to-r from-green-700 to-emerald-800 text-white mt-12 shadow-inner">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start justify-center text-center">
                <!-- Colonne 1 : copyright + petite description -->
                <div class="space-y-2">
                    <div class="flex items-center justify-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="text-sm font-semibold tracking-wide">Collecte 2025</span>
                    </div>
                    <p class="text-xs text-green-100 leading-relaxed max-w-xs mx-auto">
                        Plateforme de recensement des agents de l'État.
                    </p>
                    <p class="text-xs text-green-200/70 mt-2">
                        &copy; {{ date('Y') }} MFPTRSP/DSI
                    </p>
                </div>

                <!-- Colonne 2 : liens rapides (utiles pour le footer) -->
                <div class="space-y-2">

                </div>

                <!-- Colonne 3 : contact ou information supplémentaire -->
        
                </div>
            </div>

            <!-- Séparation fine et copyright compact -->
            <div class="border-t border-white/10 mt-6 pt-4 text-center">
                <p class="text-xs text-green-200/60">

                </p>
            </div>
        </div>
    </footer>
</body>
</html>