<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StockController; 
use App\Http\Controllers\Client\ProduitController as ClientProduitController;
use App\Http\Controllers\Client\PanierController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Show payment form
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
// Process payment
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/utilisateurs', [UserController::class, 'index'])->name('admin.utilisateurs');

    Route::get('/admin/produits', [ProduitController::class, 'index'])->name('admin.produits');
    Route::post('/admin/produits', [ProduitController::class, 'store'])->name('admin.produits.store');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/admin/stock', [StockController::class, 'index'])->name('admin.stock');
    Route::post('/admin/stock/reapprovisionner/{id}', [StockController::class, 'reapprovisionner'])->name('admin.stock.reapprovisionner');

    Route::get('/admin/commandes', function () {
        return view('admin.gestion_commandes');
    })->name('admin.commandes');

    Route::get('/admin/avis', function () {
        return view('admin.gestion_avis');
    })->name('admin.avis');

    Route::get('/admin/produits/edit/{id}', [ProduitController::class, 'edit'])->name('admin.produits.edit');
    Route::put('/admin/produits/update/{id}', [ProduitController::class, 'update'])->name('admin.produits.update');
    Route::delete('/admin/produits/delete/{id}', [ProduitController::class, 'destroy'])->name('admin.produits.destroy');

    Route::get('/admin/users', [UserController::class, 'index'])->name('gestion_users');
    Route::put('/admin/users/{user}', [UserController::class, 'updateRole'])->name('gestion_users.updateRole');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('gestion_users.destroy');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/produits', [ClientProduitController::class, 'index'])->name('client.produits');

    Route::post('/client/panier/ajouter/{produitId}', [PanierController::class, 'ajouterAuPanier'])->name('client.panier.ajouter');
    Route::get('/client/mon_panier', [PanierController::class, 'afficherPanier'])->name('client.panier');
    Route::delete('/client/panier/remove/{produitId}', [PanierController::class, 'removeProduit'])->name('client.panier.remove');
    Route::patch('/client/panier/update/{produitId}', [PanierController::class, 'updateQuantity'])->name('client.panier.update');

    Route::get('/client/categories', [CategoryController::class, 'showCategories'])->name('client.categories');

    Route::get('/client/contactez-nous', function () {
        return view('client.contact');
    })->name('client.contact');

    Route::get('/client/mon-profile', [ProfileController::class, 'show'])->name('client.profile');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';