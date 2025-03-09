<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paiement extends Model
{
    protected $fillable = [
        'commande_id', 
        'montant', 
        'transaction_id'
    ];

    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class);
    }
}