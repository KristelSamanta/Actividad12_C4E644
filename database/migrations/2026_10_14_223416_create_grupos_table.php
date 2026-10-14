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
    Schema::create('grupos', function (Blueprint $table) {
        $table->id();

        $table->foreignId('curso_id')
            ->constrained('cursos')
            ->restrictOnDelete();

        $table->foreignId('docente_id')
            ->constrained('docentes')
            ->restrictOnDelete();

        $table->unsignedInteger('numero');
        $table->unsignedInteger('cupo');

        $table->timestamps();

        $table->unique(['curso_id', 'numero']);
    });
}

public function down(): void
{
    Schema::dropIfExists('grupos');
}

};
