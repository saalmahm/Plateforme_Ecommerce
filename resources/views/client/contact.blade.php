@extends('client.layout')

@section('title', 'Contactez-nous - ShopEase')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase - Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Informations de Contact -->
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-6">Contactez-nous</h1>
                <p class="text-gray-600 mb-8">
                    Nous sommes là pour vous aider. N'hésitez pas à nous contacter pour toute question ou suggestion.
                </p>

                <!-- Coordonnées -->
                <div class="space-y-6">
                    <!-- Adresse -->
                    <div class="flex items-start space-x-4">
                        <div class="p-3 bg-orange-100 rounded-lg">
                            <i class="fas fa-map-marker-alt text-orange-500"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Notre adresse</h3>
                            <p class="text-gray-600 mt-1">
                                YouCode , Safi , Maroc
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start space-x-4">
                        <div class="p-3 bg-orange-100 rounded-lg">
                            <i class="fas fa-envelope text-orange-500"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Email</h3>
                            <a href="mailto:contact@shopease.com" class="text-orange-500 hover:text-orange-600 mt-1">
                                contact@shopease.com
                            </a>
                        </div>
                    </div>

                    <!-- Téléphone -->
                    <div class="flex items-start space-x-4">
                        <div class="p-3 bg-orange-100 rounded-lg">
                            <i class="fas fa-phone text-orange-500"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Téléphone</h3>
                            <a href="tel:+33123456789" class="text-orange-500 hover:text-orange-600 mt-1">
                                0687435789
                            </a>
                        </div>
                    </div>

                    <!-- Horaires -->
                    <div class="flex items-start space-x-4">
                        <div class="p-3 bg-orange-100 rounded-lg">
                            <i class="fas fa-clock text-orange-500"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Horaires</h3>
                            <p class="text-gray-600 mt-1">
                                Lun - Ven: 9h00 - 18h00<br>
                                Sam: 10h00 - 16h00
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Réseaux sociaux -->
                <div class="mt-8">
                    <h3 class="font-semibold text-gray-900 mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="p-3 bg-orange-100 rounded-lg text-orange-500 hover:bg-orange-200 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="p-3 bg-orange-100 rounded-lg text-orange-500 hover:bg-orange-200 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="p-3 bg-orange-100 rounded-lg text-orange-500 hover:bg-orange-200 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="p-3 bg-orange-100 rounded-lg text-orange-500 hover:bg-orange-200 transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Formulaire de Contact -->
            <div class="bg-white rounded-xl shadow-sm p-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Envoyez-nous un message</h2>
                <form>
                    <div class="space-y-6">
                        <!-- Nom -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                   required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                   required>
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="4" 
                                      class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                                      required></textarea>
                        </div>

                        <!-- Bouton d'envoi -->
                        <button type="submit" class="w-full px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                            Envoyer le message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
@endsection
