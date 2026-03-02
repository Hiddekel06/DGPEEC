@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-xl mx-auto">
        <div class="bg-white rounded-lg shadow-xl p-8 border-t-4 border-green-600">
            <div class="mb-6">
                <a href="{{ route('ministeres.select') }}" class="text-green-600 hover:text-green-800 font-semibold">
                    ← Retour
                </a>
            </div>

            <h1 class="text-3xl font-bold mb-2 text-green-800">Vérification du matricule</h1>
            <p class="text-gray-600 mb-2">Ministère : <span class="font-semibold">{{ $ministere->name }}</span></p>
            <p class="text-sm text-gray-500 mb-8">Veuillez entrer votre matricule pour continuer</p>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('matricule.validate', $ministere) }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="matricule" class="block text-gray-700 font-semibold mb-3">
                        Matricule *
                    </label>
                    <input type="text" 
                           id="matricule" 
                           name="matricule" 
                           value="{{ old('matricule') }}"
                           class="w-full px-4 py-3 border-2 border-green-200 rounded-lg focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-200 bg-white text-gray-800 transition uppercase"
                           placeholder="Ex: 123456A"
                           required
                           maxlength="20">
                    <p class="text-sm text-gray-500 mt-2">Format : au moins 6 chiffres + 1 lettre (ex: 123456A)</p>
                </div>

                <button type="submit" 
                        class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                    Valider et continuer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
