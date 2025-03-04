<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'panier_produit')
                    ->withPivot('quantite');
    }

    public function calculerTotal()
    {
        return $this->produits->sum(function ($produit) {
            return $produit->prix * $produit->pivot->quantite;
        });
    }
}