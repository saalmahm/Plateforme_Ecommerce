<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'commande_id', 
        'montant', 
        'method', 
        'transaction_id', 
        'status'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function genererRecu()
    {
        // Logique de génération de reçu
        return [
            'commande_id' => $this->commande_id,
            'montant' => $this->montant,
            'method' => $this->method,
            'date' => $this->created_at,
        ];
    }
}