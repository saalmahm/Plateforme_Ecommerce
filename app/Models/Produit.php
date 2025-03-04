<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'nom', 
        'description', 
        'prix', 
        'stock', 
        'category_id', 
        'image',
        'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function paniers()
    {
        return $this->belongsToMany(Panier::class, 'panier_produit')
                    ->withPivot('quantite');
    }
    
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_produit')
                    ->withPivot('quantite', 'prix');
    }
}