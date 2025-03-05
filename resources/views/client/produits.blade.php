@extends('client.layout')

@section('title', 'Produits - ShopEase')

@section('content')
    <div class="mb-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden group">
                <div class="relative">
                    <img src="https://placehold.co/400x300" alt="iPhone 15 Pro" class="w-full h-48 object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">iPhone 15 Pro</h3>
                    <p class="text-sm text-gray-500 mb-4">Le dernier iPhone avec la puce A17 Pro.</p>
                    <span class="text-lg font-bold text-gray-900">1299.99 €</span>
                    <button class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors mt-4">
                        Ajouter au panier
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm overflow-hidden group">
                <div class="relative">
                    <img src="https://placehold.co/400x300" alt="MacBook Air" class="w-full h-48 object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">MacBook Air M2</h3>
                    <p class="text-sm text-gray-500 mb-4">Ordinateur portable puissant avec puce M2.</p>
                    <span class="text-lg font-bold text-gray-900">1199.99 €</span>
                    <button class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors mt-4">
                        Ajouter au panier
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm overflow-hidden group">
                <div class="relative">
                    <img src="https://placehold.co/400x300" alt="Samsung Galaxy" class="w-full h-48 object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Samsung Galaxy S23</h3>
                    <p class="text-sm text-gray-500 mb-4">Smartphone Samsung avec écran AMOLED.</p>
                    <span class="text-lg font-bold text-gray-900">999.99 €</span>
                    <button class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors mt-4">
                        Ajouter au panier
                    </button>
                </div>
            </div>

        </div>
    </div>
@endsection
