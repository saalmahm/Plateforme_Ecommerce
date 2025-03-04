@extends('admin.layout')

@section('title', 'Gestion des Utilisateurs')

@section('content')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase Admin - Gestion Utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <main class="p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Gestion des Utilisateurs</h1>
        
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Utilisateur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rôle</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=Salma+Hamdi" class="w-8 h-8 rounded-lg mr-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Salma Hamdi</p>
                                    <p class="text-xs text-gray-500">@saalmahm</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">salma.hamdi@example.com</td>
                        <td class="px-6 py-4">
                            <select class="text-sm border rounded-lg px-2 py-1 focus:ring-2 focus:ring-orange-500">
                                <option selected>Admin</option>
                                <option>Client</option>
                            </select>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-orange-600 hover:text-orange-900">
                                <i class="fas fa-save"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900 ml-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <img src="https://ui-avatars.com/api/?name=John+Doe" class="w-8 h-8 rounded-lg mr-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">John Doe</p>
                                    <p class="text-xs text-gray-500">@johndoe</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">john.doe@example.com</td>
                        <td class="px-6 py-4">
                            <select class="text-sm border rounded-lg px-2 py-1 focus:ring-2 focus:ring-orange-500">
                                <option>Admin</option>
                                <option selected>Client</option>
                            </select>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-orange-600 hover:text-orange-900">
                                <i class="fas fa-save"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900 ml-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
@endsection
