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
        Schema::create('clients', function (Blueprint $table) {
            $table->id("id_client");
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->unique();

            $table->string('adresse');
            $table->string('codePostal');
            $table->string('ville');
            $table->string('pays');
            $table->string('website')->nullable();
            $table->string('tel');
            
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
        Schema::dropIfExists('clients');
    }
};
