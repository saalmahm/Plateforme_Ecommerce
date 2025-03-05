<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/utilisateurs', function () {
    return view('admin.gestion_users');
})->name('admin.utilisateurs');

Route::get('/admin/produits', function () {
    return view('admin.gestion_produits');
})->name('admin.produits');

Route::get('/admin/categories', function () {
    return view('admin.gestion_categories');
})->name('admin.categories');

Route::get('/admin/stock', function () {
    return view('admin.gestion_stock');
})->name('admin.stock');

require __DIR__.'/auth.php';
