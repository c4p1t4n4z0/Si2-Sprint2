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
        Schema::create('proceso_crediticios', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->float('plazo');
            $table->string('estado')->default('en_revicion');
            $table->date('fecha_solicitud');
            $table->date('fecha_aprobacion')->nullable();
            $table->string('observacion');
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_tipo_credito');

            $table->foreign('id_empleado')->references('id')->on('empleados');
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_tipo_credito')->references('id')->on('tipo_creditos');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proceso_crediticios');
    }
};
