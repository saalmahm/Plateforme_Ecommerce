<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gererUtilisateur()
    {
        // Implémentation
    }

    public function gererProduits()
    {
        // Implémentation
    }

    public function gererCommandes()
    {
        // Implémentation
    }

    public function suivreStock()
    {
        // Implémentation
    }

    public function gererCategory()
    {
        // Implémentation
    }
}
