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
        Schema::create('form_jiridiques', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->foreign('id')->references('id')->on('users');
            $table->string('nomSociete');
            $table->string('adresse');
            $table->string('codePostal');
            $table->string('ville');
            $table->string('pays');
            $table->string('website');
            $table->string('RC');
            $table->string('IF');
            $table->string('patent');
            $table->string('cnss');
            $table->string('ICF');
            $table->string('tel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_jiridiques');
    }
};
