@extends('client.layout')

@section('title', 'Produits - ShopEase')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Nos Produits</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($produits as $produit)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group transition-transform transform hover:scale-105">
                <div class="relative">
                    <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" 
                         class="w-full h-48 object-cover">
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $produit->nom }}</h3>
                    <p class="text-sm text-gray-500 mb-4">{{ Str::limit($produit->description, 80) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-900">{{ number_format($produit->prix, 2, ',', ' ') }} €</span>
                    </div>
                    <div class="mt-4 flex flex-col gap-2">
                        <form action="{{ route('client.panier.ajouter', $produit->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                                Ajouter au panier
                            </button>
                        </form>
                        <button class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            Ajouter un commentaire
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection