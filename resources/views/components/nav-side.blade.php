<aside class="hidden md:flex flex-col w-64 bg-white border-r border-gray-200">
    <div class="p-4 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-orange-500 rounded-lg">
                <i class="fas fa-shopping-bag text-white"></i>
            </div>
            <span class="text-xl font-bold text-gray-900">ShopEase</span>
        </div>
    </div>

    <nav class="flex-1 p-4 space-y-2 overflow-y-auto scrollbar-hide">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 bg-orange-50 text-orange-600 rounded-lg font-medium">
            <i class="fas fa-chart-pie"></i>
            <span>Tableau de Bord</span>
        </a>
        <a href="{{ route('admin.utilisateurs') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors">
            <i class="fas fa-users"></i>
            <span>Utilisateurs</span>
        </a>
        <a href="{{ route('admin.produits') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors">
            <i class="fas fa-box"></i>
            <span>Produits</span>
        </a>
        <a href="{{ route('admin.categories') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors">
            <i class="fas fa-tags"></i>
            <span>Catégories</span>
        </a>
        <a href="{{ route('admin.stock') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors">
            <i class="fas fa-warehouse"></i>
            <span>Stocks</span>
        </a>
        <a href="{{ route('admin.commandes')}}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors">
            <i class="fas fa-shopping-cart"></i>
            <span>Commandes</span>
        </a>
        <a href="{{ route('admin.avis')}}" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:bg-orange-50 hover:text-orange-600 rounded-lg transition-colors">
            <i class="fas fa-star"></i>
            <span>Avis</span>
        </a>
    </nav>

    <div class="p-4 border-t border-gray-200">
        <div class="flex items-center space-x-3">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nom }}&background=FB923C&color=fff" class="w-10 h-10 rounded-lg">
            <div>
                <p class="text-sm font-medium text-gray-900">{{ Auth::user()->nom }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->role }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="mt-4 w-full px-4 py-2 text-sm text-red-600 font-medium hover:bg-red-50 rounded-lg transition-colors">
                <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
            </button>
        </form>
    </div>
</aside>
