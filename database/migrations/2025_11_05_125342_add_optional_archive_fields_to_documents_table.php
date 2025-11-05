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
        Schema::table('documents', function (Blueprint $table) {
            // Campos opcionales para archivo de documentos
            $table->string('referencia_ubicacion')->nullable()->after('descripcion');
            $table->string('soporte')->nullable()->after('referencia_ubicacion');
            $table->string('volumen')->nullable()->after('soporte');
            $table->string('nombre_productor')->nullable()->after('volumen');
            $table->string('informacion_valoracion')->nullable()->after('nombre_productor');
            $table->string('lengua_documentos')->nullable()->after('informacion_valoracion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn([
                'referencia_ubicacion',
                'soporte',
                'volumen',
                'nombre_productor',
                'informacion_valoracion',
                'lengua_documentos'
            ]);
        });
    }
};
