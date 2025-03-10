<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo et Nom -->
            <div class="flex items-center">
                <a href="#" class="flex items-center space-x-3">
                    <div class="p-2 bg-orange-500 rounded-lg">
                        <i class="fas fa-shopping-bag text-white"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-900">ShopEase</span>
                </a>
            </div>

            <!-- Menu de Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('client.produits')}}" class="text-orange-500 font-medium">Produits</a>
                <a href="{{ route('client.categories')}}" class="text-gray-500 hover:text-orange-500">Catégories</a>
                <a href="{{ route('client.contact')}}" class="text-gray-500 hover:text-orange-500">Contact</a>
            </div>

            <!-- Actions Utilisateur -->
            <div class="flex items-center space-x-6">
                <!-- Panier -->
                <div class="relative">
                    <a href="{{ route('client.panier') }}" class="p-2 text-gray-500 hover:text-orange-500">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-orange-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">3</span>
                    </a>
                </div>

                <!-- Profil et Déconnexion -->
                @if(Auth::check())
                <div class="flex items-center space-x-3">
                    <a href="{{ route('client.profile')}}">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nom }}&background=FB923C&color=fff" class="w-8 h-8 rounded-lg">
                    </a>
                    <span class="text-sm font-medium text-gray-700">{{ Auth::user()->nom }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</nav>
