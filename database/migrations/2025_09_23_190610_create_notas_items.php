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
        Schema::create('notas_items', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('archivo');
            $table->integer('activo')->default(0);
            $table->unsignedBigInteger('nota_id');
            $table->foreign('nota_id')->references('id')->on('notas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas_items');
    }
};
