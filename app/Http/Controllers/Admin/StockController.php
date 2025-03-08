<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class StockController extends Controller
{
    public function index()
    {
        $stockData = Produit::all(); 

        return view('admin.gestion_stock', ['stockData' => $stockData]);
    }

    public function reapprovisionner($id)
    {
        $produit = Produit::find($id);

        if ($produit) {
            $produit->stock += 10;
            $produit->save();

            return redirect()->route('admin.stock')->with('success', 'Le stock a été réapprovisionné avec succès.');
        }

        return redirect()->route('admin.stock')->with('error', 'Produit non trouvé.');
    }
}
