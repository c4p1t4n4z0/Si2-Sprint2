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
        Schema::create('detalle_beneficios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_plan');
            $table->unsignedBigInteger('id_beneficio');
            $table->foreign('id_plan')->references('id')->on('plans');
            $table->foreign('id_beneficio')->references('id')->on('beneficios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_benefios');
    }
};
