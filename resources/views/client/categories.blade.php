@extends('client.layout')

@section('title', 'Mon panier - ShopEase')

@section('content')
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-white">
    <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Choisissez une catégorie</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="group relative cursor-pointer">
            <div class="relative h-48 bg-gray-800 overflow-hidden rounded-lg shadow-lg">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-0 transition-opacity duration-300"></div>
                <div class="absolute inset-0 bg-orange-400 opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <h3 class="text-white text-2xl font-bold transition-all duration-500 
                                   group-hover:text-white">Électronique</h3>
                        <p class="text-gray-200 text-sm mt-2 transition-all duration-500 
                                  group-hover:text-white">156 produits</p>
                    </div>
                </div>
            </div>
            <a href="/products?category=electronique" class="absolute inset-0 z-10"></a>
        </div>

        <div class="group relative cursor-pointer">
            <div class="relative h-48 bg-gray-800 overflow-hidden rounded-lg shadow-lg">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-0 transition-opacity duration-300"></div>
                <div class="absolute inset-0 bg-orange-400 opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <h3 class="text-white text-2xl font-bold transition-all duration-500 
                                   group-hover:text-white">Mode</h3>
                        <p class="text-gray-200 text-sm mt-2 transition-all duration-500 
                                  group-hover:text-white">89 produits</p>
                    </div>
                </div>
            </div>
            <a href="/products?category=mode" class="absolute inset-0 z-10"></a>
        </div>

        <div class="group relative cursor-pointer">
            <div class="relative h-48 bg-gray-800 overflow-hidden rounded-lg shadow-lg">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-0 transition-opacity duration-300"></div>
                <div class="absolute inset-0 bg-orange-400 opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <h3 class="text-white text-2xl font-bold transition-all duration-500 
                                   group-hover:text-white">Maison</h3>
                        <p class="text-gray-200 text-sm mt-2 transition-all duration-500 
                                  group-hover:text-white">124 produits</p>
                    </div>
                </div>
            </div>
            <a href="/products?category=maison" class="absolute inset-0 z-10"></a>
        </div>

        <div class="group relative cursor-pointer">
            <div class="relative h-48 bg-gray-800 overflow-hidden rounded-lg shadow-lg">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-0 transition-opacity duration-300"></div>
                <div class="absolute inset-0 bg-orange-400 opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <h3 class="text-white text-2xl font-bold transition-all duration-500 
                                   group-hover:text-white">Sport</h3>
                        <p class="text-gray-200 text-sm mt-2 transition-all duration-500 
                                  group-hover:text-white">78 produits</p>
                    </div>
                </div>
            </div>
            <a href="/products?category=sport" class="absolute inset-0 z-10"></a>
        </div>

        <div class="group relative cursor-pointer">
            <div class="relative h-48 bg-gray-800 overflow-hidden rounded-lg shadow-lg">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-0 transition-opacity duration-300"></div>
                <div class="absolute inset-0 bg-orange-400 opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <h3 class="text-white text-2xl font-bold transition-all duration-500 
                                   group-hover:text-white">Beauté</h3>
                        <p class="text-gray-200 text-sm mt-2 transition-all duration-500 
                                  group-hover:text-white">92 produits</p>
                    </div>
                </div>
            </div>
            <a href="/products?category=beaute" class="absolute inset-0 z-10"></a>
        </div>

        <div class="group relative cursor-pointer">
            <div class="relative h-48 bg-gray-800 overflow-hidden rounded-lg shadow-lg">
                <div class="absolute inset-0 bg-black opacity-50 group-hover:opacity-0 transition-opacity duration-300"></div>
                <div class="absolute inset-0 bg-orange-400 opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <h3 class="text-white text-2xl font-bold transition-all duration-500 
                                   group-hover:text-white">Livres</h3>
                        <p class="text-gray-200 text-sm mt-2 transition-all duration-500 
                                  group-hover:text-white">145 produits</p>
                    </div>
                </div>
            </div>
            <a href="/products?category=livres" class="absolute inset-0 z-10"></a>
        </div>
    </div>
</main>
@endsection
