
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->foreignId('grupo_id')
                ->constrained('grupos')
                ->cascadeOnDelete();

            $table->foreignId('estudiante_id')
                ->constrained('estudiantes')
                ->restrictOnDelete();

            $table->date('fecha');
            $table->decimal('nota_final', 5, 2)->nullable();

            $table->unique(['grupo_id', 'estudiante_id']);
        });
    }

    public function down(): void
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->dropUnique(['grupo_id', 'estudiante_id']);
            $table->dropForeign(['grupo_id']);
            $table->dropForeign(['estudiante_id']);
            $table->dropColumn([
                'grupo_id',
                'estudiante_id',
                'fecha',
                'nota_final',
            ]);
        });
    }
};
