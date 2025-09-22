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
        Schema::create('informes_legislativos_items', function (Blueprint $table) {
            $table->id();
            $table->string('archivo');
            $table->unsignedBigInteger('informe_id');
            $table->foreign('informe_id')->references('id')->on('informes_legislativos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informes_legislativos_items');
    }
};
