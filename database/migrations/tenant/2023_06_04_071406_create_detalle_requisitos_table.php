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
        Schema::create('detalle_requisitos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_requisito');
            $table->unsignedBigInteger('id_tipo_credito');
            $table->foreign('id_requisito')->references('id')->on('requisitos');
            $table->foreign('id_tipo_credito')->references('id')->on('tipo_creditos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_requisitos');
    }
};
