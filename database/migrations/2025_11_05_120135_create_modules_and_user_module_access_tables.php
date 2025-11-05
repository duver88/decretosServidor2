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
        // Tabla de módulos del sistema
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del módulo (ej: "Relatoría de Actos Administrativos")
            $table->string('slug')->unique(); // Identificador único (ej: "actos-administrativos")
            $table->string('description')->nullable(); // Descripción del módulo
            $table->string('icon')->nullable(); // Icono para el menú
            $table->string('route_prefix')->nullable(); // Prefijo de rutas (ej: "dashboard", "concepts")
            $table->integer('order')->default(0); // Orden en el menú
            $table->boolean('is_active')->default(true); // Si el módulo está activo
            $table->timestamps();
        });

        // Tabla de accesos de usuarios a módulos
        Schema::create('user_module_access', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('module_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Un usuario no puede tener acceso duplicado al mismo módulo
            $table->unique(['user_id', 'module_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_module_access');
        Schema::dropIfExists('modules');
    }
};
