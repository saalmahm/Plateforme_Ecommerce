<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->enum('status', [
                'en_attente', 
                'traitee', 
                'livree', 
                'annulee'
            ])->default('en_attente');
            $table->decimal('total', 10, 2);
            $table->date('date_commande');
            $table->text('adresse_livraison')->nullable();
            $table->timestamps();
        });

        Schema::create('commande_produit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')
                  ->constrained('commandes')
                  ->onDelete('cascade');
            $table->foreignId('produit_id')
                  ->constrained('produits')
                  ->onDelete('cascade');
            $table->integer('quantite');
            $table->decimal('prix', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commande_produit');
        Schema::dropIfExists('commandes');
    }
}