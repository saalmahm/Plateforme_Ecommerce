@extends('client.layout')

@section('title', 'Mon panier - ShopEase')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase - Mon Panier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Mon Panier</h1>
            <p class="text-gray-500 mt-2">3 articles dans votre panier</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b">
                        <div class="flex items-start space-x-4">
                            <img src="https://placehold.co/400x300" alt="iPhone 15 Pro" class="w-24 h-24 rounded-lg object-cover">
                            <div class="flex-1">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">iPhone 15 Pro</h3>
                                        <p class="text-sm text-gray-500 mt-1">Titanium - 256GB</p>
                                    </div>
                                    <button class="text-gray-400 hover:text-red-500">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <div class="flex items-center border rounded-lg">
                                        <button class="px-3 py-1 text-gray-600 hover:text-orange-500">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="px-4 py-1 border-x">1</span>
                                        <button class="px-3 py-1 text-gray-600 hover:text-orange-500">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <span class="text-lg font-bold text-gray-900">1299.99 €</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-b">
                        <div class="flex items-start space-x-4">
                            <img src="https://placehold.co/400x300" alt="AirPods Pro" class="w-24 h-24 rounded-lg object-cover">
                            <div class="flex-1">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">AirPods Pro</h3>
                                        <p class="text-sm text-gray-500 mt-1">2ème génération</p>
                                    </div>
                                    <button class="text-gray-400 hover:text-red-500">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <div class="flex items-center border rounded-lg">
                                        <button class="px-3 py-1 text-gray-600 hover:text-orange-500">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="px-4 py-1 border-x">1</span>
                                        <button class="px-3 py-1 text-gray-600 hover:text-orange-500">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <span class="text-lg font-bold text-gray-900">279.99 €</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produit 3 -->
                    <div class="p-6">
                        <div class="flex items-start space-x-4">
                            <img src="https://placehold.co/400x300" alt="Apple Watch" class="w-24 h-24 rounded-lg object-cover">
                            <div class="flex-1">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">Apple Watch Series 9</h3>
                                        <p class="text-sm text-gray-500 mt-1">GPS - 45mm</p>
                                    </div>
                                    <button class="text-gray-400 hover:text-red-500">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <div class="flex items-center border rounded-lg">
                                        <button class="px-3 py-1 text-gray-600 hover:text-orange-500">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="px-4 py-1 border-x">1</span>
                                        <button class="px-3 py-1 text-gray-600 hover:text-orange-500">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <span class="text-lg font-bold text-gray-900">449.99 €</span>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <span class="text-gray-500">Sous-total (3 articles)</span>
                                <span class="text-gray-900">2029.97 €</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Frais de livraison</span>
                                <span class="text-green-500">Gratuit</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-900">405.99 €</span>
                            </div>
                            <div class="pt-3 border-t">
                                <div class="flex justify-between">
                                    <span class="text-lg font-semibold text-gray-900">Total</span>
                                    <span class="text-lg font-semibold text-gray-900">2435.96 €</span>
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
</body>
</html>
@endsection
