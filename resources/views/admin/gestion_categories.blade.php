@extends('admin.layout')

@section('title', 'Gestion des categories')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ShopEase Admin - Gestion des Catégories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <main class="p-6">
        <!-- Top Bar -->
        <div class="bg-white border-b border-gray-200 px-6 py-4 mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Gestion des Catégories</h1>
            <button onclick="openAddModal()" class="mt-4 bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                <i class="fas fa-plus mr-2"></i>Nouvelle Catégorie
            </button>
        </div>

        <!-- Categories Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produits</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Category Rows -->
                    @foreach($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center">
                                <i class="fas fa-folder text-orange-500"></i>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm font-medium text-gray-900">{{ $category->nom }}</p>
                            <p class="text-xs text-gray-500">{{ $category->description }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full text-xs font-medium">
                                {{ $category->produits->count() }} produits
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $category->created_at->format('Y-m-d') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-3">
                            <button onclick="openEditModal({{ $category->id }}, '{{ $category->nom }}', '{{ $category->description }}')" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="confirmDelete({{ $category->id }})" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Add/Edit Category Modal -->
    <div id="categoryModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900" id="modalTitle">Ajouter une catégorie</h3>
            </div>
            <form id="categoryForm" class="p-6" action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div id="methodField"></div>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom de la catégorie</label>
                        <input type="text" name="nom" id="categoryName" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="categoryDescription" rows="3" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-50">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Notification pour les messages de succès
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#f97316'
            });
        @endif

        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Ajouter une catégorie';
            document.getElementById('categoryForm').action = "{{ route('admin.categories.store') }}";
            document.getElementById('categoryName').value = '';
            document.getElementById('categoryDescription').value = '';
            
            // Supprimer method field s'il existe
            const methodField = document.getElementById('methodField');
            methodField.innerHTML = '';
            
            document.getElementById('categoryModal').classList.remove('hidden');
            document.getElementById('categoryModal').classList.add('flex');
        }

        function openEditModal(id, nom, description) {
            document.getElementById('modalTitle').textContent = 'Modifier la catégorie';
            document.getElementById('categoryForm').action = `/admin/categories/${id}`; // Corrected URL
            document.getElementById('categoryName').value = nom;
            document.getElementById('categoryDescription').value = description.replace(/&quot;/g, '"');
            
            // Ajouter le champ method PUT
            const methodField = document.getElementById('methodField');
            methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
            
            document.getElementById('categoryModal').classList.remove('hidden');
            document.getElementById('categoryModal').classList.add('flex');
        }


        function closeModal() {
            document.getElementById('categoryModal').classList.add('hidden');
            document.getElementById('categoryModal').classList.remove('flex');
        }

        function confirmDelete(categoryId) {
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
                    // Créer un formulaire pour envoyer la requête DELETE
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/admin/categories/${categoryId}`; // Corrected URL
                    
                    // Ajouter le token CSRF
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    form.appendChild(csrfToken);
                    
                    // Ajouter la méthode DELETE
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';
                    form.appendChild(methodField);
                    
                    // Ajouter le formulaire au document et le soumettre
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

    </script>
</body>
</html>
@endsection