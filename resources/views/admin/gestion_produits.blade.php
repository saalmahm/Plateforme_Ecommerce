@extends('admin.layout')

@section('title', 'Tableau de Bord')

@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase Admin - Gestion des Produits</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
    </style>
</head>
<body class="bg-gray-50">
    <main class="p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Gestion des Produits</h1>
        <button onclick="openAddModal()" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors mb-4">
            <i class="fas fa-plus mr-2"></i>Nouveau Produit
        </button>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catégorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">iPhone 15 Pro</td>
                        <td class="px-6 py-4 whitespace-nowrap">Électronique</td>
                        <td class="px-6 py-4 whitespace-nowrap">1299.99 €</td>
                        <td class="px-6 py-4 whitespace-nowrap">150 unités</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <button onclick="openEditModal(1)" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="confirmDelete(1)" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        function openAddModal() {
            Swal.fire({
                title: 'Ajouter un produit',
                input: 'text',
                inputLabel: 'Nom du produit',
                showCancelButton: true,
                confirmButtonText: 'Enregistrer'
            });
        }
        function openEditModal(productId) {
            Swal.fire({
                title: 'Modifier le produit',
                input: 'text',
                inputLabel: 'Nom du produit',
                showCancelButton: true,
                confirmButtonText: 'Enregistrer'
            });
        }
        function confirmDelete(productId) {
            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Cette action est irréversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f97316',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Supprimé!', 'Le produit a été supprimé.', 'success');
                }
            });
        }
    </script>
</body>
</html>
@endsection