@extends('layouts.app')

@section('progress_step', 'formulaire')

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
                                    Collecte de données 2025
                                </h1>
                                <p class="text-sm text-gray-500 mt-1">
                                    Gestion des agents de l'État
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 text-sm">
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-700 font-medium">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l14-4"/>
                                </svg>
                                {{ $ministere->name }}
                            </span>
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
                                <h3 class="text-sm font-medium text-red-800">
                                    Veuillez corriger les erreurs suivantes :
                                </h3>
                                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Formulaire -->
                <form action="{{ route('form.submit', ['ministere' => $ministere]) }}" method="POST" class="p-6">
                    @csrf
                    <input type="hidden" name="_token_form" value="{{ $token }}">

                    <!-- Rappel des champs obligatoires -->
                    <div class="mb-6 text-sm text-gray-500 flex items-center">
                        <span class="text-red-500 mr-1">*</span> Champs obligatoires
                    </div>

                    <!-- Grille responsive des champs -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @php
                            // Vérifier si c'est un formulaire BOM avec structures
                            $hasStructures = collect($formConfig->fields)->contains(fn($f) => isset($f['structure']));
                            if ($hasStructures) {
                                $structures = [
                                    'presidence' => 'Présidence de la République',
                                    'primature' => 'Primature',
                                    'ministeres' => 'Ministères',
                                    'total' => 'Total'
                                ];
                            }
                        @endphp

                        @if($hasStructures)
                            {{-- Affichage structuré pour BOM --}}
                            @php
                                $fieldsByStructure = collect($formConfig->fields)->groupBy('structure');
                            @endphp
                            
                            @foreach($structures as $key => $label)
                                @if($fieldsByStructure->has($key))
                                    <div class="md:col-span-2">
                                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-lg p-4 mb-4">
                                            <h3 class="text-lg font-semibold text-gray-800">{{ $label }}</h3>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            @foreach($fieldsByStructure[$key] as $field)
                                                <div>
                                                    <label for="{{ $field['name'] }}" class="block text-sm font-medium text-gray-700 mb-2">
                                                        {{ $field['sublabel'] ?? $field['label'] }}
                                                        @if($field['required'])
                                                            <span class="text-red-500 ml-1">*</span>
                                                        @endif
                                                    </label>
                                                    <input type="number" 
                                                           id="{{ $field['name'] }}" 
                                                           name="form_data[{{ $field['name'] }}]" 
                                                           value="{{ old('form_data.' . $field['name']) }}"
                                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150 text-lg font-medium"
                                                           @if($field['required']) required @endif
                                                           min="0">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            {{-- Affichage normal pour autres ministères --}}
                            @foreach($formConfig->fields as $field)
                                @if($field['type'] === 'heading')
                                    <div class="md:col-span-2">
                                        <h2 class="text-lg font-semibold text-gray-800 mt-6 mb-4 pb-3 border-b border-gray-300">
                                            {{ $field['label'] }}
                                        </h2>
                                    </div>
                                @else
                                    <div class="@if(in_array($field['type'], ['textarea'])) md:col-span-2 @endif">
                                        <label for="{{ $field['name'] }}" class="block text-sm font-medium text-gray-700 mb-1">
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
                                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150 {{ $field['name'] === 'matricule' ? 'uppercase' : '' }}"
                                                   @if($field['name'] === 'matricule') placeholder="Ex: 123456A" @endif
                                                   @if($field['required']) required @endif>

                                        @elseif($field['type'] === 'number')
                                            <input type="number" 
                                                   id="{{ $field['name'] }}" 
                                                   name="form_data[{{ $field['name'] }}]" 
                                                   value="{{ old('form_data.' . $field['name']) }}"
                                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150"
                                                   @if($field['required']) required @endif>

                                        @elseif($field['type'] === 'date')
                                            <input type="date" 
                                                   id="{{ $field['name'] }}" 
                                                   name="form_data[{{ $field['name'] }}]" 
                                                   value="{{ old('form_data.' . $field['name']) }}"
                                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150"
                                                   @if($field['required']) required @endif>

                                        @elseif($field['type'] === 'select')
                                            <select id="{{ $field['name'] }}" 
                                                    name="form_data[{{ $field['name'] }}]" 
                                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150 bg-white"
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
                                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150"
                                                      @if($field['required']) required @endif>{{ old('form_data.' . $field['name']) }}</textarea>
                                        @endif

                                        <!-- Petit message d'aide (optionnel) -->
                                        <p class="mt-1 text-xs text-gray-400">Réponse requise</p>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>

                    <!-- Actions du formulaire -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button type="submit" 
                                    class="flex-1 inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Envoyer mes réponses
                            </button>
                            <a href="{{ route('ministeres.select') }}" 
                               class="flex-1 inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150">
                                Annuler
                            </a>
                        </div>
                        <p class="text-xs text-gray-400 text-center mt-4 flex items-center justify-center">
                            <svg class="w-4 h-4 mr-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            Une fois vos données soumises, aucune modification ne sera possible.
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection