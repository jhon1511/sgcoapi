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
        Schema::create('matriculaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('curso_id');
            $table->integer('estudiante_id');
            $table->date('fecha_matriculacion');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculaciones');
    }
};
