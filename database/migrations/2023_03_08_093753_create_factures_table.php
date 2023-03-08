<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id('id_facture');

            $table->unsignedBigInteger("id_client");
            $table->foreign("id_client")->references("id_client")->on("clients");

            $table->date("dateEmission");
            $table->date("dateFin");
            $table->integer("quantite");
            $table->integer("prixHT");
            $table->integer("tva");
            $table->string('modePayment');

            
            $table->unsignedBigInteger("id_user");
            $table->foreign("id_user")->references("id")->on("users");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
