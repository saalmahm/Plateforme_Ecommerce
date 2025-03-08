<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function ajouterAuPanier(Request $request, $produitId)
    {
        $produit = Produit::findOrFail($produitId);
        $user = Auth::user();

        // Vérifier si l'utilisateur a déjà un panier
        $panier = Panier::firstOrCreate(['user_id' => $user->id]);

        // Ajouter le produit au panier avec une quantité par défaut de 1
        $panier->produits()->syncWithoutDetaching([$produit->id => ['quantity' => 1]]);

        return redirect()->route('client.produits')->with('success', 'Produit ajouté au panier avec succès!');
    }

    public function afficherPanier()
    {
        $user = Auth::user();
        $panier = Panier::where('user_id', $user->id)->first();

        return view('client.panier', compact('panier'));
    }

    public function removeProduit($produitId)
    {
        $user = Auth::user();
        $panier = Panier::where('user_id', $user->id)->first();

        if ($panier) {
            $panier->produits()->detach($produitId);
        }

        return redirect()->route('client.panier')->with('success', 'Produit supprimé du panier avec succès!');
    }

    public function updateQuantity(Request $request, $produitId)
    {
        $user = Auth::user();
        $panier = Panier::where('user_id', $user->id)->first();

        if ($panier) {
            $quantity = $panier->produits()->where('produit_id', $produitId)->first()->pivot->quantity;

            if ($request->action === 'increase') {
                $quantity++;
            } elseif ($request->action === 'decrease' && $quantity > 1) {
                $quantity--;
            }

            $panier->produits()->updateExistingPivot($produitId, ['quantity' => $quantity]);
        }

        return redirect()->route('client.panier')->with('success', 'Quantité mise à jour avec succès!');
    }
}
