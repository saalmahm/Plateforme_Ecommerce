<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/utilisateurs', function () {
        return view('admin.gestion_users');
    })->name('admin.utilisateurs');

    Route::get('/admin/produits', function () {
        return view('admin.gestion_produits');
    })->name('admin.produits');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/admin/stock', function () {
        return view('admin.gestion_stock');
    })->name('admin.stock');

    Route::get('/admin/commandes', function () {
        return view('admin.gestion_commandes');
    })->name('admin.commandes');

    Route::get('/admin/avis', function () {
        return view('admin.gestion_avis');
    })->name('admin.avis');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/produits', function () {
        return view('client.produits');
    })->name('client.produits');

    Route::get('/client/mon_panier', function () {
        return view('client.panier');
    })->name('client.panier');

    Route::get('/client/categories', [CategoryController::class, 'showCategories'])->name('client.categories');

    Route::get('/client/contactez-nous', function () {
        return view('client.contact');
    })->name('client.contact');

    Route::get('/client/mon-profile', function () {
        return view('client.profile');
    })->name('client.profile');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
