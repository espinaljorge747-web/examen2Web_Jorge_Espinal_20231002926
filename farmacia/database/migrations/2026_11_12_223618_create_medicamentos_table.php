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
    Schema::create('medicamentos', function (Blueprint $table) {
        $table->id();
        $table->string('codigo', 50)->unique();
        $table->string('nombre', 255);
        $table->enum('categoria', ['Antibióticos', 'Analgésicos', 'Sueros', 'Material Quirúrgico', 'Vitaminas']);
        $table->decimal('precio', 10, 2);
        $table->decimal('costo', 10, 2);
        $table->integer('inventario')->default(0);
        $table->string('imagen')->nullable();
        $table->string('laboratorio', 255);
        $table->date('fecha_vencimiento');
        $table->date('fecha_registro');
        $table->string('numero_lote', 50);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
