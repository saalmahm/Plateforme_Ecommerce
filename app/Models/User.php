<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nom', 
        'email', 
        'password', 
        'role', 
        'female'
    ];

    protected $hidden = [
        'password', 
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function panier()
    {
        return $this->hasOne(Panier::class);
    }
    
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}