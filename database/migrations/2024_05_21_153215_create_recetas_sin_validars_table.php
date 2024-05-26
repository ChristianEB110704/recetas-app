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
        Schema::create('recetas_sin_validar', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('duracion');
            $table->string('categoria');
            $table->longtext('descripcion');
            $table->longtext('pasos');
            $table->foreignId('user_id');
            $table->timestamps(); 
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetas_sin_validar');
    }
};
