@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-2xl mx-auto text-center">
        <div class="bg-white rounded-lg shadow-xl p-12">
            <div class="mb-6">
                <svg class="w-20 h-20 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h1 class="text-4xl font-bold text-green-600 mb-4">Merci !</h1>
            <p class="text-lg text-gray-600 mb-2">Vos données ont été enregistrées avec succès.</p>
            <p class="text-sm text-gray-500 mb-8">Votre contribution est précieuse pour la collecte de données 2025.</p>

            <a href="{{ route('ministeres.select') }}" 
               class="inline-block bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>
@endsection
