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
        Schema::create('publicaciones_items', function (Blueprint $table) {
            $table->id();
            $table->string('archivo');
            // $table->integer('posicion')->default(0);
            $table->integer('activo')->default(0);
            $table->unsignedBigInteger('publicacion_id');
            $table->foreign('publicacion_id')->references('id')->on('publicaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones_items');
    }
};
