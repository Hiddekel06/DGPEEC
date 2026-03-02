@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-xl mx-auto">
        <div class="bg-white rounded-lg shadow-xl p-8 border-t-4 border-green-600">
            <h1 class="text-3xl font-bold mb-2 text-green-800">Plateforme de Collecte</h1>
            <p class="text-gray-600 mb-8">Veuillez sélectionner votre ministère</p>

            @if($ministeres->isEmpty())
                <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded">
                    Aucun ministère disponible pour le moment.
                </div>
            @else
                <form action="{{ route('ministeres.handle') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="ministere" class="block text-gray-700 font-semibold mb-3">
                            Ministère *
                        </label>
                        <select id="ministere" name="ministere_id" 
                                class="w-full px-4 py-3 border-2 border-green-200 rounded-lg focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-200 bg-white text-gray-800 transition"
                                required>
                            <option value="">-- Choisissez votre ministère --</option>
                            @foreach($ministeres as $ministere)
                                <option value="{{ $ministere->id }}">{{ $ministere->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                        Continuer
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
