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
        // Índices para tabla documents
        Schema::table('documents', function (Blueprint $table) {
            $table->index('fecha', 'idx_documents_fecha');
            $table->index('tipo', 'idx_documents_tipo');
            $table->index(['category_id', 'fecha'], 'idx_documents_category_fecha');
            $table->index(['document_type_id', 'fecha'], 'idx_documents_type_fecha');
            $table->index(['document_theme_id', 'fecha'], 'idx_documents_theme_fecha');
            $table->index('numero', 'idx_documents_numero');
        });

        // Índices para tabla concepts
        Schema::table('concepts', function (Blueprint $table) {
            $table->index('fecha', 'idx_concepts_fecha');
            $table->index('año', 'idx_concepts_año');
            $table->index('tipo_documento', 'idx_concepts_tipo_documento');
            $table->index(['concept_type_id', 'fecha'], 'idx_concepts_type_fecha');
            $table->index(['concept_theme_id', 'fecha'], 'idx_concepts_theme_fecha');
            $table->index('user_id', 'idx_concepts_user_id');
        });

        // Índices para user_concept_permissions
        Schema::table('user_concept_permissions', function (Blueprint $table) {
            $table->index(['user_id', 'concept_type_id'], 'idx_user_concept_permissions');
            $table->index(['user_id', 'can_create'], 'idx_user_concept_create');
            $table->index(['user_id', 'can_edit'], 'idx_user_concept_edit');
            $table->index(['user_id', 'can_delete'], 'idx_user_concept_delete');
        });

        // Índices para user_module_access
        Schema::table('user_module_access', function (Blueprint $table) {
            $table->index(['user_id', 'module_id'], 'idx_user_module_access');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropIndex('idx_documents_fecha');
            $table->dropIndex('idx_documents_tipo');
            $table->dropIndex('idx_documents_category_fecha');
            $table->dropIndex('idx_documents_type_fecha');
            $table->dropIndex('idx_documents_theme_fecha');
            $table->dropIndex('idx_documents_numero');
        });

        Schema::table('concepts', function (Blueprint $table) {
            $table->dropIndex('idx_concepts_fecha');
            $table->dropIndex('idx_concepts_año');
            $table->dropIndex('idx_concepts_tipo_documento');
            $table->dropIndex('idx_concepts_type_fecha');
            $table->dropIndex('idx_concepts_theme_fecha');
            $table->dropIndex('idx_concepts_user_id');
        });

        Schema::table('user_concept_permissions', function (Blueprint $table) {
            $table->dropIndex('idx_user_concept_permissions');
            $table->dropIndex('idx_user_concept_create');
            $table->dropIndex('idx_user_concept_edit');
            $table->dropIndex('idx_user_concept_delete');
        });

        Schema::table('user_module_access', function (Blueprint $table) {
            $table->dropIndex('idx_user_module_access');
        });
    }
};
