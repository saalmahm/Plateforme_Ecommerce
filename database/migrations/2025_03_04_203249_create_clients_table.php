<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            // Hérite de la table users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Ajoutez des colonnes spécifiques au client ici, si nécessaire
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}