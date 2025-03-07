@extends('admin.layout')

@section('title', 'Gestion des produits')

@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($produits as $produit)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produit->nom }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produit->category->nom }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produit->prix }} €</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $produit->stock }} unités</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->nom }}" class="w-16 h-16 object-cover rounded-lg">                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <button onclick="openEditModal({{ $produit->id }})" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="confirmDelete({{ $produit->id }})" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <!-- Add/Edit Product Modal -->
    <div id="productModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-xl max-w-3xl w-full mx-4 p-6">
            <div class="pb-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900" id="modalTitle">Ajouter un produit</h3>
            </div>
            <form id="productForm" action="{{ route('admin.produits.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Produit</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Catégorie</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Prix</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Stock</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Image</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2"><input type="text" name="nom" class="border rounded-lg px-2 py-1 w-full" required></td>
                            <td class="px-4 py-2">
                                <select name="category_id" class="border rounded-lg px-2 py-1 w-full" required>
                                    <option value="">Sélectionner</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nom }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="px-4 py-2"><input type="number" name="prix" step="0.01" class="border rounded-lg px-2 py-1 w-full" required></td>
                            <td class="px-4 py-2"><input type="number" name="stock" class="border rounded-lg px-2 py-1 w-full" required></td>
                            <td class="px-4 py-2"><input type="file" name="image" class="border rounded-lg px-2 py-1 w-full" required></td>
                            <td class="px-4 py-2"><textarea name="description" class="border rounded-lg px-2 py-1 w-full"></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-50">Annuler</button>
                    <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <script>
                function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Ajouter un produit';
            document.getElementById('productModal').classList.remove('hidden');
        }

        function openEditModal(productId) {
    document.getElementById('modalTitle').textContent = 'Modifier le produit';
    
    let form = document.getElementById('productForm');
    form.action = `/admin/produits/update/${productId}`;
    
    let methodField = document.createElement('input');
    methodField.type = 'hidden';
    methodField.name = '_method';
    methodField.value = 'PUT';
    form.appendChild(methodField);
    
    fetch(`/admin/produits/edit/${productId}`)
        .then(response => response.json())
        .then(data => {
            document.querySelector('input[name="nom"]').value = data.nom;
            document.querySelector('select[name="category_id"]').value = data.category_id;
            document.querySelector('input[name="prix"]').value = data.prix;
            document.querySelector('input[name="stock"]').value = data.stock;
            document.querySelector('textarea[name="description"]').value = data.description;
            

            document.querySelector('input[name="image"]').removeAttribute('required');
        });
    
    document.getElementById('productModal').classList.remove('hidden');
}

        function closeModal() {
            document.getElementById('productModal').classList.add('hidden');
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
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/produits/delete/${productId}`;
            
            // Ajouter le token CSRF
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            form.appendChild(csrfToken);
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';
            form.appendChild(methodField);
            
            document.body.appendChild(form);
            form.submit();
        }
    });
}

        document.getElementById('productForm').addEventListener('submit', function(e) {
            closeModal();
            Swal.fire({
                icon: 'success',
                title: 'Succès!',
                text: 'Le produit a été enregistré.',
                confirmButtonColor: '#f97316'
            });
        });
    </script>
</body>
</html>
@endsection