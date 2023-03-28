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
            $table->string("quantite");
            $table->string("prixHT");
            $table->string("Description",1000)->nullable();
            $table->string('modePayment');

            $table->unsignedBigInteger("id_user");
            $table->foreign("id_user")->references("id")->on("users");

            $table->string('statut')->default('nonpayer');
            $table->integer('nbr_facture')->default('0');
            $table->string('pdf',1000)->nullable();
            $table->string('note')->nullable();

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
