<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'user_id', 
        'status', 
        'total', 
        'date_commande', 
        'adresse_livraison'
    ];

    protected $dates = ['date_commande'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commande_produit')
                    ->withPivot('quantite', 'prix');
    }
    
    public function paiement()
    {
        return $this->hasOne(Paiement::class);
    }

    public function calculerTotal()
    {
        return $this->produits->sum(function ($produit) {
            return $produit->pivot->prix * $produit->pivot->quantite;
        });
    }
}