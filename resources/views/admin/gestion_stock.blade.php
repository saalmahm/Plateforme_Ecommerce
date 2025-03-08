@extends('admin.layout')

@section('title', 'Gestion de stock')

@section('content')
<main class="p-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Suivi des Stocks</h1>
    
    <!-- Stock Alert Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        @foreach ($stockData as $data)
            @if ($data->stock == 0)
                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                        </div>
                        <span class="text-sm font-medium text-red-500">Critique</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $data->stock }}</h3>
                    <p class="text-sm text-gray-500">{{ $data->nom }} en rupture de stock</p>
                </div>
            @elseif ($data->stock < 10) <!-- Utilise une valeur arbitraire pour le stock faible -->
                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-yellow-100 rounded-lg">
                            <i class="fas fa-bell text-yellow-500 text-xl"></i>
                        </div>
                        <span class="text-sm font-medium text-yellow-500">Attention</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $data->stock }}</h3>
                    <p class="text-sm text-gray-500">{{ $data->nom }} en stock faible</p>
                </div>
            @else
                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <i class="fas fa-check-circle text-green-500 text-xl"></i>
                        </div>
                        <span class="text-sm font-medium text-green-500">Normal</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $data->stock }}</h3>
                    <p class="text-sm text-gray-500">{{ $data->nom }} en stock suffisant</p>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Stock Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produit</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catégorie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock actuel</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dernière mise à jour</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($stockData as $data)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $data->nom }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $data->category->nom ?? 'N/A' }}</td>
                        <td class="px-6 py-4 font-bold {{ $data->stock == 0 ? 'text-red-600' : ($data->stock < 10 ? 'text-yellow-600' : 'text-green-600') }}">{{ $data->stock }} unités</td>
                        <td class="px-6 py-4 text-gray-500">{{ $data->updated_at }}</td>
                        <td class="px-6 py-4 text-right">
                            <button class="px-3 py-1 bg-orange-500 text-white rounded-lg hover:bg-orange-600 text-sm">Réapprovisionner</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
