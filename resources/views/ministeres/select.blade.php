@extends('layouts.app')

@section('progress_step', 'ministere')

@section('content')
<div class="container mx-auto px-4 py-8 sm:py-12">
    <div class="w-full max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-xl p-6 sm:p-8 border-t-4 border-green-600">
            <h1 class="text-2xl sm:text-3xl font-bold mb-2 text-green-800">Sélectionnez votre structure pour télécharger sa maquette</h1>
           

            @if($ministeres->isEmpty())
                <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded text-sm sm:text-base">
                    Aucun ministère disponible pour le moment.
                </div>
            @else
                <!-- Barre de recherche avec bouton -->
                <div class="mb-6 flex flex-col sm:flex-row gap-2">
                    <input 
                        type="text" 
                        id="searchInput" 
                        placeholder="Rechercher un ministere ou une structure..." 
                        class="flex-1 px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border-2 border-gray-200 rounded-lg focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-200 transition"
                    >
                    <button 
                        id="searchBtn"
                        type="button"
                        class="px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold text-sm sm:text-base rounded-lg transition duration-200 shadow-md hover:shadow-lg whitespace-nowrap">
                        Rechercher
                    </button>
                    <button 
                        id="resetBtn"
                        type="button"
                        class="px-4 sm:px-6 py-2 sm:py-3 border-2 border-gray-300 hover:border-gray-400 text-gray-700 font-semibold text-sm sm:text-base rounded-lg transition duration-200 whitespace-nowrap">
                        Réinitialiser
                    </button>
                </div>

                <div id="ministeeresList" class="grid grid-cols-1 gap-3 sm:gap-4">
                    @foreach($ministeres->whereNull('parent_id') as $ministere)
                        <!-- Ministère principal -->
                        <div data-name="{{ strtolower($ministere->name) }}" class="ministere-card">
                            @if($ministere->divisions->count() > 0)
                                <!-- Ministère avec divisions -->
                                <div class="border-2 border-gray-200 rounded-lg hover:border-green-600 hover:bg-green-50 transition duration-200 shadow-sm hover:shadow-md">
                                    <button 
                                        class="toggle-divisions w-full text-left p-4 sm:p-6 flex flex-col sm:flex-row items-start sm:items-center justify-between cursor-pointer group gap-3 sm:gap-0" 
                                        data-ministere-id="{{ $ministere->id }}">
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 group-hover:text-green-700 transition break-words">

                                                {{ $ministere->name }}
                                            </h3>
                                            @if($ministere->description)
                                                <p class="text-sm text-gray-600 mt-2">
                                                    {{ $ministere->description }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <svg class="w-6 h-6 text-green-600 transform transition-transform duration-200 toggle-icon" data-ministere-id="{{ $ministere->id }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                            </svg>
                                        </div>
                                    </button>
                                    
                                    <!-- Divisions cachées par défaut -->
                                    <div class="divisions-container hidden border-t border-gray-200" data-ministere-id="{{ $ministere->id }}">
                                        @foreach($ministere->divisions as $division)
                                            <a href="{{ route('template.download', $division->code) }}" 
                                               class="division-card block p-3 sm:p-4 pl-8 sm:pl-10 border-b border-gray-100 hover:bg-green-50 transition duration-200 cursor-pointer">
                                                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
                                                    <div class="flex-1 min-w-0">
                                                        <h4 class="font-medium text-sm sm:text-base text-gray-700 hover:text-green-700 transition break-words">
                                                            {{ $division->name }}
                                                        </h4>
                                                        @if($division->description)
                                                            <p class="text-xs text-gray-500 mt-1">
                                                                {{ $division->description }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="ml-2 flex-shrink-0">
                                                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <!-- Ministère sans divisions (lien direct) -->
                                <a href="{{ route('template.download', $ministere->code) }}" 
                                   class="group block p-4 sm:p-6 border-2 border-gray-200 rounded-lg hover:border-green-600 hover:bg-green-50 transition duration-200 cursor-pointer shadow-sm hover:shadow-md">
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-0">
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 group-hover:text-green-700 transition break-words">
                                                {{ $ministere->name }}
                                            </h3>
                                            @if($ministere->description)
                                                <p class="text-sm text-gray-600 mt-2">
                                                    {{ $ministere->description }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="ml-2 sm:ml-4 flex-shrink-0">
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-600 group-hover:translate-x-1 transition transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div id="noResults" class="hidden text-center py-6 sm:py-8">
                    <p class="text-sm sm:text-base text-gray-500">Aucun ministère trouvé correspondant à votre recherche.</p>
                </div>
                

                <script>
                    const searchInput = document.getElementById('searchInput');
                    const searchBtn = document.getElementById('searchBtn');
                    const resetBtn = document.getElementById('resetBtn');
                    const ministeeresList = document.getElementById('ministeeresList');
                    const noResults = document.getElementById('noResults');
                    const ministereCards = document.querySelectorAll('.ministere-card');
                    const toggleButtons = document.querySelectorAll('.toggle-divisions');

                    // Toggle divisions
                    toggleButtons.forEach(button => {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();
                            const ministereId = this.getAttribute('data-ministere-id');
                            const container = document.querySelector(`.divisions-container[data-ministere-id="${ministereId}"]`);
                            const icon = document.querySelector(`.toggle-icon[data-ministere-id="${ministereId}"]`);
                            
                            if (container) {
                                container.classList.toggle('hidden');
                                icon.classList.toggle('rotate-180');
                            }
                        });
                    });

                    function performSearch() {
                        const searchTerm = searchInput.value.toLowerCase();
                        let visibleCount = 0;

                        ministereCards.forEach(card => {
                            const name = card.getAttribute('data-name');
                            if (searchTerm === '' || name.includes(searchTerm)) {
                                card.style.display = '';
                                visibleCount++;
                            } else {
                                card.style.display = 'none';
                            }
                        });

                        if (visibleCount === 0 && searchTerm !== '') {
                            noResults.classList.remove('hidden');
                        } else {
                            noResults.classList.add('hidden');
                        }
                    }

                    searchBtn.addEventListener('click', performSearch);
                    
                    searchInput.addEventListener('keypress', function(e) {
                        if (e.key === 'Enter') {
                            performSearch();
                        }
                    });

                    resetBtn.addEventListener('click', function() {
                        searchInput.value = '';
                        performSearch();
                        // Fermer tous les dropdowns
                        document.querySelectorAll('.divisions-container').forEach(div => {
                            div.classList.add('hidden');
                        });
                        document.querySelectorAll('.toggle-icon').forEach(icon => {
                            icon.classList.remove('rotate-180');
                        });
                    });
                </script>
            @endif
        </div>
    </div>
</div>
@endsection
