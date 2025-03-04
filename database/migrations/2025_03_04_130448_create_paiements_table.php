<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')
                  ->constrained('commandes')
                  ->onDelete('cascade');
            $table->decimal('montant', 10, 2);
            $table->enum('method', [
                'carte_credit', 
                'paypal', 
                'virement', 
                'especes'
            ]);
            $table->string('transaction_id')->nullable();
            $table->enum('status', [
                'en_attente', 
                'reussi', 
                'echoue'
            ])->default('en_attente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paiements');
    }
}