<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.gestion_categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Category::create([
            'nom' => $request->nom,
            'description' => $request->description
        ]);

        return redirect()->route('admin.categories')->with('success', 'Catégorie ajoutée avec succès!');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $category->update([
            'nom' => $request->nom,
            'description' => $request->description
        ]);

        return redirect()->route('admin.categories')->with('success', 'Catégorie mise à jour avec succès!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Catégorie supprimée avec succès!');
    }
}
