<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Collecte</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-50 min-h-screen flex flex-col">

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
            </div>
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
                <div class="md:col-span-full space-y-2">
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