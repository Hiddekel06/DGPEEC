@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Mes collectes de données</h1>
            <a href="{{ route('ministeres.select') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                Nouvelle collecte
            </a>
        </div>

        @if($collections->isEmpty())
            <div class="bg-blue-50 border border-blue-200 text-blue-800 px-6 py-8 rounded text-center">
                <p class="text-lg">Vous n'avez pas encore collecté de données.</p>
                <a href="{{ route('ministeres.select') }}" class="text-blue-600 hover:text-blue-800 font-semibold mt-4 inline-block">
                    Commencer une nouvelle collecte →
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b-2 border-gray-300">
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Ministère</th>
                            <th class="px-4 py-3 text-left font-semibold text-gray-700">Date</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collections as $collection)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3">
                                    <div class="font-semibold text-gray-800">{{ $collection->ministere->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $collection->ministere->code }}</div>
                                </td>
                                <td class="px-4 py-3 text-gray-600">
                                    {{ $collection->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <button class="text-blue-600 hover:text-blue-800 font-semibold text-sm">
                                        Voir détails
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
