<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Collecte</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-amber-50 min-h-screen flex flex-col">
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <footer class="bg-amber-900 text-white py-6 mt-8">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm">&copy; {{ date('Y') }} Plateforme de Collecte de Données - Tous droits réservés</p>
            <p class="text-xs mt-2 text-amber-200">Ministère de la Fonction Publique</p>
        </div>
    </footer>
</body>
</html>
