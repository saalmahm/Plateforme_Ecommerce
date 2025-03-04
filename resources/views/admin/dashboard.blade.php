@extends('admin.layout')

@section('title', 'Tableau de Bord')

@section('content')
    <div class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="px-6 py-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-900">Tableau de bord</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-500">
                        <i class="far fa-clock mr-2"></i> {{ now()->format('Y-m-d H:i:s') }}
                    </span>
                    <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-bell"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-orange-100 rounded-lg">
                        <i class="fas fa-euro-sign text-orange-500 text-xl"></i>
                    </div>
                    <span class="text-sm font-medium text-orange-500">+12.5%</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900">54,350 €</h3>
                <p class="text-sm text-gray-500">Ventes totales</p>
            </div>
        </div>
    </div>
@endsection
