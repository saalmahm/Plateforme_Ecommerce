@extends('admin.layout')

@section('title', 'Gestion des avis')

@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase Admin - Gestion des Avis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .star-filled { color: #F59E0B; }
        .star-empty { color: #D1D5DB; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <main class="flex-1 overflow-y-auto">
            <!-- Top Bar -->
            <div class="bg-white border-b border-gray-200 sticky top-0 z-10">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-bold text-gray-900">Gestion des Avis</h1>
                    </div>
                </div>
            </div>

            <!-- Reviews List -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <h3 class="text-lg font-semibold text-gray-900">Derniers avis</h3>
                    </div>
                </div>

                <!-- Reviews Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Note</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Commentaire</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Review Row -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-lg bg-gray-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-mobile-alt text-gray-500"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">iPhone 15 Pro</p>
                                            <p class="text-xs text-gray-500">#PRD-2025-001</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://ui-avatars.com/api/?name=John+Doe" class="h-8 w-8 rounded-full mr-3">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">John Doe</p>
                                            <p class="text-xs text-gray-500">Vérifié ✓</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <i class="fas fa-star star-filled"></i>
                                        <i class="fas fa-star star-filled"></i>
                                        <i class="fas fa-star star-filled"></i>
                                        <i class="fas fa-star star-filled"></i>
                                        <i class="fas fa-star star-filled"></i>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-900 max-w-md truncate">Excellent produit, je suis très satisfait de mon achat. La qualité est au rendez-vous...</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <p class="text-sm text-gray-900">2025-03-05</p>
                                    <p class="text-xs text-gray-500">12:15:32</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex justify-end space-x-3">
                                        <button onclick="showReviewDetails(1)" class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button onclick="respondToReview(1)" class="text-orange-600 hover:text-orange-900">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                        <button onclick="deleteReview(1)" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Functions de gestion des avis -->
    <script>
        // Functions de gestion des avis
        function showReviewDetails(reviewId) {
            alert("Affichage des détails de l'avis #" + reviewId);
        }

        function respondToReview(reviewId) {
            alert("Répondre à l'avis #" + reviewId);
        }

        function deleteReview(reviewId) {
            alert("Suppression de l'avis #" + reviewId);
        }
    </script>
</body>
</html>
@endsection