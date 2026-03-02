@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-8 border-t-4 border-amber-700">
            <h1 class="text-3xl font-bold mb-2 text-amber-900">Plateforme de Collecte</h1>
            <p class="text-gray-600 mb-8">Veuillez sélectionner votre ministère</p>

            @if($ministeres->isEmpty())
                <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded">
                    Aucun ministère disponible pour le moment.
                </div>
            @else
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="ministere" class="block text-gray-700 font-semibold mb-3">
                            Ministère *
                        </label>
                        <select id="ministere" name="ministere_id" 
                                class="w-full px-4 py-3 border-2 border-amber-200 rounded-lg focus:outline-none focus:border-amber-600 bg-white text-gray-800"
                                onchange="if(this.value) alert('Ministère sélectionné: ' + this.options[this.selectedIndex].text)">
                            <option value="">-- Choisissez votre ministère --</option>
                            @foreach($ministeres as $ministere)
                                <option value="{{ $ministere->id }}">{{ $ministere->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" 
                            class="w-full bg-amber-700 hover:bg-amber-800 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
                        Continuer
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
