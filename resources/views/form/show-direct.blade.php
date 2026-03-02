@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-emerald-50 py-8 md:py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <!-- Carte principale -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                
                <!-- En-tête type Google Forms (icône + titres) -->
                <div class="px-6 py-5 border-b border-gray-200 bg-white">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <!-- Icône de document / clipboard -->
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-800 tracking-tight">
                                    Les sortants du Centre de Formation Judiciaire_2025
                                </h1>
                                <p class="text-sm text-gray-500 mt-1">
                                    Ministère : {{ $ministere->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Message d'erreur amélioré -->
                @if ($errors->any())
                    <div class="mx-6 mt-6 bg-red-50 border-l-4 border-red-500 rounded-r-lg p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Veuillez corriger les erreurs ci-dessous :</h3>
                                <ul class="mt-2 text-sm text-red-700 list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Formulaire -->
                <div class="px-6 py-6">
    <form action="{{ route('form.submit-direct', $ministere) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_token_form" value="{{ $token }}">

                        <div class="space-y-6">
                            @foreach($formConfig->fields as $field)
                                <div>
                                    <label for="{{ $field['name'] }}" class="block text-sm font-medium text-gray-900 mb-2">
                                        {{ $field['label'] }}
                                        @if($field['required'])
                                            <span class="text-red-500 ml-1">*</span>
                                        @endif
                                    </label>

                                    @if($field['type'] === 'text')
                                        <input type="text" 
                                               id="{{ $field['name'] }}" 
                                               name="form_data[{{ $field['name'] }}]" 
                                               value="{{ old('form_data.' . $field['name']) }}"
                                               class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                               @if($field['required']) required @endif>

                                    @elseif($field['type'] === 'date')
                                        <input type="date" 
                                               id="{{ $field['name'] }}" 
                                               name="form_data[{{ $field['name'] }}]" 
                                               value="{{ old('form_data.' . $field['name']) }}"
                                               class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                               @if($field['required']) required @endif>

                                    @elseif($field['type'] === 'select')
                                        <select id="{{ $field['name'] }}" 
                                                name="form_data[{{ $field['name'] }}]" 
                                                class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
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
                                                  class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                                  placeholder="Entrez votre texte"
                                                  @if($field['required']) required @endif>{{ old('form_data.' . $field['name']) }}</textarea>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- Boutons -->
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <div class="flex gap-3">
                                <button type="submit" 
                                        class="flex-1 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-200 shadow-sm hover:shadow-md text-sm">
                                    Soumettre
                                </button>
                                <a href="{{ route('ministeres.select') }}" 
                                   class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2.5 px-4 rounded-lg transition duration-200 text-center text-sm">
                                    Annuler
                                </a>
                            </div>
                            <p class="text-xs text-gray-500 text-center mt-3">
                                ⚠️ Une fois soumises, les données ne pourront plus être modifiées.
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
