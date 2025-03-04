<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanierProduitTable extends Migration
{
    public function up()
    {
        Schema::create('panier_produit', function (Blueprint $table) {
            $table->id();
            $table->foreignId('panier_id')->constrained()->onDelete('cascade');
            $table->foreignId('produit_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('panier_produit');
    }
}
