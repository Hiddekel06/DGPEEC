@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-xl p-8 border-t-4 border-green-600">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-green-800 mb-2">COLLECTE DE DONNÉES DE GESTION DES AGENTS DE L'ÉTAT POUR 2025</h1>
                <div class="flex justify-between text-sm text-gray-600">
                    <p>Ministère : <span class="font-semibold">{{ $ministere->name }}</span></p>
                    <p>Matricule : <span class="font-mono font-semibold">{{ $matricule }}</span></p>
                </div>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6">
                    <p class="font-semibold mb-2">Erreurs de validation :</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('form.submit', ['ministere' => $ministere, 'matricule' => $matricule]) }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($formConfig->fields as $field)
                        <div class="@if(in_array($field['type'], ['textarea'])) md:col-span-2 @endif">
                            <label for="{{ $field['name'] }}" class="block text-gray-700 font-semibold mb-2">
                                {{ $field['label'] }}
                                @if($field['required'])
                                    <span class="text-red-500">*</span>
                                @endif
                            </label>

                            @if($field['type'] === 'text')
                                <input type="text" 
                                       id="{{ $field['name'] }}" 
                                       name="form_data[{{ $field['name'] }}]" 
                                       value="{{ old('form_data.' . $field['name']) }}"
                                       class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-200"
                                       @if($field['required']) required @endif>

                            @elseif($field['type'] === 'date')
                                <input type="date" 
                                       id="{{ $field['name'] }}" 
                                       name="form_data[{{ $field['name'] }}]" 
                                       value="{{ old('form_data.' . $field['name']) }}"
                                       class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-200"
                                       @if($field['required']) required @endif>

                            @elseif($field['type'] === 'select')
                                <select id="{{ $field['name'] }}" 
                                        name="form_data[{{ $field['name'] }}]" 
                                        class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-200"
                                        @if($field['required']) required @endif>
                                    <option value="">-- Sélectionnez --</option>
                                    @foreach($field['options'] as $value => $label)
                                        <option value="{{ $value }}" @if(old('form_data.' . $field['name']) == $value) selected @endif>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>

                            @elseif($field['type'] === 'textarea')
                                <textarea id="{{ $field['name'] }}" 
                                          name="form_data[{{ $field['name'] }}]" 
                                          rows="4"
                                          class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-200"
                                          @if($field['required']) required @endif>{{ old('form_data.' . $field['name']) }}</textarea>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex gap-4">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                            Soumettre mes données
                        </button>
                        <a href="{{ route('ministeres.select') }}" 
                           class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 px-6 rounded-lg transition duration-200 text-center">
                            Annuler
                        </a>
                    </div>
                    <p class="text-sm text-gray-500 text-center mt-4">
                        ⚠️ Attention : Une fois soumises, vos données ne pourront plus être modifiées.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
