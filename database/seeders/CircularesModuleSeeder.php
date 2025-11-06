<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CircularesModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si ya existe el módulo
        $exists = \DB::table('modules')->where('slug', 'circulares')->exists();

        if (!$exists) {
            \DB::table('modules')->insert([
                'name' => 'Relatoría de Circulares',
                'slug' => 'circulares',
                'description' => 'Módulo para gestionar circulares de la entidad',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->command->info("Módulo 'Relatoría de Circulares' creado exitosamente.");
        } else {
            $this->command->info("El módulo 'Relatoría de Circulares' ya existe.");
        }
    }
}
