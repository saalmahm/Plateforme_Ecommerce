@extends('admin.layout')

@section('title', 'Gestion de stock')

@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase Admin - Suivi des Stocks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-gray-50">
    <main class="p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Suivi des Stocks</h1>
        
        <!-- Stock Alert Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-red-100 rounded-lg">
                        <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-red-500">Critique</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">8</h3>
                <p class="text-sm text-gray-500">Produits en rupture de stock</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-yellow-100 rounded-lg">
                        <i class="fas fa-bell text-yellow-500 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-yellow-500">Attention</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">15</h3>
                <p class="text-sm text-gray-500">Produits en stock faible</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-green-500">Normal</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">127</h3>
                <p class="text-sm text-gray-500">Produits en stock suffisant</p>
            </div>
        </div>

        <!-- Stock Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catégorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock actuel</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock minimum</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dernière mise à jour</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">iPhone 15 Pro</td>
                        <td class="px-6 py-4 text-gray-500">Électronique</td>
                        <td class="px-6 py-4 text-red-600 font-bold">0 unités</td>
                        <td class="px-6 py-4 text-gray-500">10 unités</td>
                        <td class="px-6 py-4 text-gray-500">2025-03-05 10:30</td>
                        <td class="px-6 py-4 text-right">
                            <button class="px-3 py-1 bg-orange-500 text-white rounded-lg hover:bg-orange-600 text-sm">Réapprovisionner</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">T-Shirt Premium</td>
                        <td class="px-6 py-4 text-gray-500">Mode</td>
                        <td class="px-6 py-4 text-yellow-600 font-bold">5 unités</td>
                        <td class="px-6 py-4 text-gray-500">15 unités</td>
                        <td class="px-6 py-4 text-gray-500">2025-03-05 11:45</td>
                        <td class="px-6 py-4 text-right">
                            <button class="px-3 py-1 bg-orange-500 text-white rounded-lg hover:bg-orange-600 text-sm">Réapprovisionner</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">Casque Bluetooth Pro</td>
                        <td class="px-6 py-4 text-gray-500">Électronique</td>
                        <td class="px-6 py-4 text-green-600 font-bold">45 unités</td>
                        <td class="px-6 py-4 text-gray-500">20 unités</td>
                        <td class="px-6 py-4 text-gray-500">2025-03-05 11:30</td>
                        <td class="px-6 py-4 text-right">
                            <button class="px-3 py-1 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm">Gérer</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
@endsection
