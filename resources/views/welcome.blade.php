<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase - Votre boutique en ligne</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .hero-pattern {
            background-color: #fff7ed;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23fdba74' fill-opacity='0.1'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-orange-50">
    <!-- Navbar -->
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="p-2 bg-orange-500 rounded-lg">
                        <i class="fas fa-shopping-bag text-white"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-900">ShopEase</span>
                </a>
            </div>
            
            <div class="flex items-center space-x-6">
                <!-- Lien de Connexion -->
                <a href="{{ route('login') }}" class="relative group">
                    <span class="text-gray-700 font-medium hover:text-orange-500 transition-colors flex items-center space-x-2">
                        <i class="fas fa-user text-orange-500"></i>
                        <span>Connexion</span>
                    </span>
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-500 group-hover:w-full transition-all duration-300"></span>
                </a>

                <!-- Lien d'Inscription -->
                <a href="{{ route('register') }}" class="relative inline-flex items-center justify-center px-6 py-2 overflow-hidden font-medium transition duration-300 ease-out border-2 border-orange-500 rounded-full group">
                    <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-orange-500 group-hover:translate-x-0 ease">
                        <i class="fas fa-user-plus mr-2"></i> S'inscrire
                    </span>
                    <span class="absolute flex items-center justify-center w-full h-full text-orange-500 transition-all duration-300 transform group-hover:translate-x-full ease">
                        S'inscrire
                    </span>
                    <span class="relative invisible">S'inscrire</span>
                </a>
            </div>
        </div>
    </div>
</nav>
    <!-- Hero Section -->
    <section class="hero-pattern py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    Découvrez une nouvelle façon de faire vos achats
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    Une plateforme e-commerce intuitive et sécurisée pour tous vos besoins
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="bg-orange-500 text-white px-8 py-3 rounded-lg hover:bg-orange-600 transition-colors">
                        Commencer maintenant
                    </a>
                    <a href="#features" class="bg-white text-orange-500 px-8 py-3 rounded-lg hover:bg-gray-50 transition-colors">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Pourquoi choisir ShopEase ?</h2>
                <p class="mt-4 text-gray-600">Des fonctionnalités pensées pour une expérience d'achat optimale</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="p-6 bg-orange-50 rounded-xl text-center hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-orange-500 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Paiement Sécurisé</h3>
                    <p class="text-gray-600">Transactions protégées et multiples options de paiement disponibles</p>
                </div>

                <!-- Feature 2 -->
                <div class="p-6 bg-orange-50 rounded-xl text-center hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-orange-500 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Livraison Rapide</h3>
                    <p class="text-gray-600">Suivi en temps réel et livraison express disponible</p>
                </div>

                <!-- Feature 3 -->
                <div class="p-6 bg-orange-50 rounded-xl text-center hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-orange-500 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Support 24/7</h3>
                    <p class="text-gray-600">Une équipe dédiée à votre service à tout moment</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-lg font-semibold mb-4">À propos</h4>
                    <p class="text-gray-400">ShopEase, votre partenaire de confiance pour vos achats en ligne.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Liens rapides</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Accueil</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Produits</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-envelope mr-2 text-orange-500"></i> contact@shopease.com</li>
                        <li><i class="fas fa-phone mr-2 text-orange-500"></i> 0683720475</li>
                        <li><i class="fas fa-map-marker-alt mr-2 text-orange-500"></i> Safi, Maroc</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-orange-500 hover:text-orange-400 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-orange-500 hover:text-orange-400 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-orange-500 hover:text-orange-400 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-orange-500 hover:text-orange-400 transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 ShopEase. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>