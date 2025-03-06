<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 
        'description'
    ];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function getProduitsCountAttribute()
    {
        return $this->produits()->count();
    }

}
