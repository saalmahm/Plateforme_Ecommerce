<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'description', 
        'prix', 
        'category_id', 
        'stock',
        'image'  
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function paniers()
    {
        return $this->belongsToMany(Panier::class, 'panier_produit')->withPivot('quantity');
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_produit')->withPivot('quantity');
    }

    public function ajouterProduit()
    {
        // Implémentation
    }

    public function modifierProduit()
    {
        // Implémentation
    }

    public function supprimerProduit()
    {
        // Implémentation
    }
}
