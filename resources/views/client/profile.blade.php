@extends('client.layout')

@section('title', 'Mon Profil - ShopEase')

@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase - Mon Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
            <div class="flex items-center space-x-4">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nom }}&background=FB923C&color=fff" 
                     class="w-20 h-20 rounded-lg">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ Auth::user()->nom }}</h1>
                    <p class="text-gray-500">Membre depuis {{ Auth::user()->created_at->format('F Y') }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div>
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Informations personnelles</h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                            <input type="text" 
                                   value="{{ Auth::user()->nom }}" 
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" readonly>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" 
                               value="{{ Auth::user()->email }}" 
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" readonly>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors" disabled>
                            Modifier
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-8">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Historique des commandes</h2>
                
                <div class="border rounded-lg p-4 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <span class="text-sm font-medium text-gray-900">#CMD-2025-001</span>
                            <span class="ml-4 text-sm text-gray-500">05 mars 2025</span>
                        </div>
                        <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">Livrée</span>
                    </div>
                    <div class="flex items-start space-x-4">
                        <img src="https://placehold.co/100x100" alt="iPhone 15 Pro" class="w-16 h-16 rounded-lg">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-gray-900">iPhone 15 Pro</h4>
                            <p class="text-sm text-gray-500">Quantité: 1</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">1299.99 €</p>
                            <button class="text-orange-500 hover:text-orange-600 text-sm mt-2">
                                Voir les détails
                            </button>
                        </div>
                    </div>
                </div>

                <div class="border rounded-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <span class="text-sm font-medium text-gray-900">#CMD-2025-002</span>
                            <span class="ml-4 text-sm text-gray-500">05 mars 2025</span>
                        </div>
                        <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">En cours</span>
                    </div>
                    <div class="flex items-start space-x-4">
                        <img src="https://placehold.co/100x100" alt="AirPods Pro" class="w-16 h-16 rounded-lg">
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-gray-900">AirPods Pro</h4>
                            <p class="text-sm text-gray-500">Quantité: 1</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">279.99 €</p>
                            <button class="text-orange-500 hover:text-orange-600 text-sm mt-2">
                                Voir les détails
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
@endsection
