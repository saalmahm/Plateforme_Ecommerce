<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produit extends Model
{
    protected $fillable = [
        'nom', 
        'description', 
        'prix', 
        'category_id', 
        'stock',
        'image' 
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function commandes(): BelongsToMany
    {
        return $this->belongsToMany(Commande::class)
            ->withPivot(['quantity', 'price'])
            ->withTimestamps();
    }

    public function paniers(): BelongsToMany
    {
        return $this->belongsToMany(Panier::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }
}