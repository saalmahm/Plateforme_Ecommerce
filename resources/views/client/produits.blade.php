@extends('client.layout')

@section('title', 'Produits - ShopEase')

@section('content')
    <div class="mb-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($produits as $produit)
            <div class="bg-white rounded-xl shadow-sm overflow-hidden group">
                <div class="relative">
                    <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" class="w-full h-48 object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $produit->nom }}</h3>
                    <p class="text-sm text-gray-500 mb-4">{{ $produit->description }}</p>
                    <span class="text-lg font-bold text-gray-900">{{ number_format($produit->prix, 2, ',', ' ') }} €</span>
                    <button class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors mt-4">
                        Ajouter au panier
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
