<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'commande_id', 
        'montant', 
        'method'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function effectuerPaiement()
    {
        // Implémentation
    }

    public function genererRecu()
    {
        // Implémentation
    }
}
