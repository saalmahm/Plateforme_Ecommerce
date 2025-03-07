<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        $categories = Category::all();
        return view('admin.gestion_produits', compact('produits', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $imageName = null;
        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $path = $request->file('image')->store('images', 'public');
            \Log::info('Image stored: ' . $path);
            \Log::info('Image exists: ' . (Storage::exists($path) ? 'Yes' : 'No'));
        }
        
        $produit = Produit::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'image' => $path
        ]);
        
        \Log::info('Product created with image: ' . $produit->image);
        
        return redirect()->route('admin.produits')->with('success', 'Produit ajouté avec succès!');
    }
}
