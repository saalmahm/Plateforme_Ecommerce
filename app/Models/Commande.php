<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commande extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class)
            ->withPivot(['quantity', 'price'])
            ->withTimestamps();
    }

    public function paiements(): HasMany
    {
        return $this->hasMany(Paiement::class);
    }
}