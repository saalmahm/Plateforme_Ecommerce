@extends('client.layout')

@section('title', 'Mon panier - ShopEase')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Mon Panier</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                @foreach ($panier->produits as $produit)
                <div class="p-6 border-b">
                    <div class="flex items-start space-x-4">
                        <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" class="w-24 h-24 rounded-lg object-cover">
                        <div class="flex-1">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $produit->nom }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">{{ $produit->description }}</p>
                                </div>
                                <form action="{{ route('client.panier.remove', $produit->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-500">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="mt-4 flex items-center justify-between">
                                <div class="flex items-center border rounded-lg">
                                    <button class="px-3 py-1 text-gray-600 hover:text-orange-500" onclick="updateQuantity({{ $produit->id }}, 'decrease')">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="px-4 py-1 border-x">{{ $produit->pivot->quantity }}</span>
                                    <button class="px-3 py-1 text-gray-600 hover:text-orange-500" onclick="updateQuantity({{ $produit->id }}, 'increase')">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <span class="text-lg font-bold text-gray-900">{{ number_format($produit->prix, 2, ',', ' ') }} €</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Résumé de la Commande -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Résumé de la commande</h3>

                    <!-- Détails -->
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Sous-total ({{ $panier->produits->count() }} articles)</span>
                            <span class="text-gray-900">{{ number_format($panier->produits->sum(function ($produit) {
                                return $produit->prix * $produit->pivot->quantity;
                            }), 2, ',', ' ') }} €</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Frais de livraison</span>
                            <span class="text-green-500">Gratuit</span>
                        </div>
                        <div class="pt-3 border-t">
                            <div class="flex justify-between">
                                <span class="text-lg font-semibold text-gray-900">Total</span>
                                <span class="text-lg font-semibold text-gray-900">{{ number_format($panier->produits->sum(function ($produit) {
                                    return $produit->prix * $produit->pivot->quantity;
                                }), 2, ',', ' ') }} €</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton Commander -->
                    <button class="w-full mt-6 px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                        Procéder au paiement
                    </button>

                    <!-- Garanties -->
                    <div class="mt-6 space-y-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-shield-alt mr-2 text-orange-500"></i>
                            Paiement sécurisé
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-truck mr-2 text-orange-500"></i>
                            Livraison gratuite dès 50€
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-undo mr-2 text-orange-500"></i>
                            Retours gratuits sous 30 jours
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateQuantity(productId, action) {
            // Logique de mise à jour des quantités
        }

        function removeProduct(productId) {
            // Logique de suppression
        }
    </script>
</div>
@endsection
