@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('ministeres.select') }}" class="text-blue-600 hover:text-blue-800">← Retour</a>
        </div>

        <h1 class="text-3xl font-bold mb-2">Formulaire de collecte de données</h1>
        <p class="text-lg text-gray-600 mb-8">Ministère: <span class="font-semibold">{{ $ministere->name }}</span></p>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('data-collections.store', $ministere) }}" method="POST" class="bg-white p-6 rounded-lg border border-gray-200">
            @csrf

            <div class="mb-6">
                <label for="field1" class="block text-gray-700 font-semibold mb-2">
                    Champ 1 *
                </label>
                <input type="text" id="field1" name="form_data[field1]" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                       placeholder="Entrez une valeur" required>
            </div>

            <div class="mb-6">
                <label for="field2" class="block text-gray-700 font-semibold mb-2">
                    Champ 2 *
                </label>
                <textarea id="field2" name="form_data[field2]" 
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                          rows="4" placeholder="Entrez une description" required></textarea>
            </div>

            <div class="mb-6">
                <label for="field3" class="block text-gray-700 font-semibold mb-2">
                    Champ 3 *
                </label>
                <select id="field3" name="form_data[field3]" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="">Sélectionnez une option</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    Soumettre
                </button>
                <a href="{{ route('ministeres.select') }}" class="flex-1 bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-lg hover:bg-gray-400 transition text-center">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
