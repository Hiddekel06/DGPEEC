@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto text-center">
        <div class="mb-6">
            <svg class="w-16 h-16 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-green-600 mb-4">Succès !</h1>
        <p class="text-lg text-gray-600 mb-8">Vos données ont été collectées avec succès.</p>

        <div class="flex flex-col gap-4">
            <a href="{{ route('ministeres.select') }}" class="bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                Collecte autre données
            </a>
            <a href="{{ route('data-collections.index') }}" class="bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-lg hover:bg-gray-400 transition">
                Voir mes collectes
            </a>
        </div>
    </div>
</div>
@endsection
