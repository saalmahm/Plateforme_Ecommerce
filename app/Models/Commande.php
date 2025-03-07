<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'date', 
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paiement()
    {
        return $this->hasOne(Paiement::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commande_produit')->withPivot('quantity');
    }

    public function passerCommande()
    {
        // Implémentation
    }

    public function annulerCommande()
    {
        // Implémentation
    }

    public function suivreCommande()
    {
        // Implémentation
    }
}
