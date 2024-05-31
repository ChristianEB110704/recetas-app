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
        Schema::create('usuarios_like', function (Blueprint $table) {
            $table->foreignid("user_id");
            $table->foreignId('comentarios_id');
            $table->timestamps();

            // Definir la clave primaria compuesta
            $table->primary(['user_id', 'comentarios_id']);

            // Definir las claves foráneas si es necesario
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('comentarios_id')->references('id')->on('comentarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_like');
    }
};
