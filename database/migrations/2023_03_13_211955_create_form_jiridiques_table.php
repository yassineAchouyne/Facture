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
            $table->string('nomSociete')->nullable();
            $table->string('adresse');
            $table->string('codePostal');
            $table->string('ville');
            $table->string('pays');
            $table->string('website')->nullable();
            $table->string('RC')->nullable();
            $table->string('IF');
            $table->string('patent')->nullable();
            $table->string('cnss')->nullable();
            $table->string('ICE');
            $table->string('fax')->nullable();
            $table->string('logo',1000)->nullable();
            $table->string('taxe')->nullable();
            $table->string('cnie')->nullable();
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
