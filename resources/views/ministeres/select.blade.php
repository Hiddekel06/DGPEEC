@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">Sélectionnez votre ministère</h1>

        @if($ministeres->isEmpty())
            <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded">
                Aucun ministère disponible pour le moment.
            </div>
        @else
            <div class="grid gap-4">
                @foreach($ministeres as $ministere)
                    <a href="{{ route('data-collections.create', $ministere) }}" 
                       class="block p-6 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $ministere->name }}</h2>
                        <p class="text-gray-600 mb-2">Code: <span class="font-mono">{{ $ministere->code }}</span></p>
                        @if($ministere->description)
                            <p class="text-gray-600">{{ $ministere->description }}</p>
                        @endif
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
