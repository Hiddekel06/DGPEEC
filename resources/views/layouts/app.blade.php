<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Collecte</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-50 min-h-screen flex flex-col">
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <footer class="bg-gradient-to-r from-green-700 to-emerald-800 text-white py-6 mt-8">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm">&copy; {{ date('Y') }} Plateforme de Collecte de Données - Tous droits réservés</p>
            <p class="text-xs mt-2 text-green-100">Ministère de la Fonction Publique</p>
        </div>
    </footer>
</body>
</html>
