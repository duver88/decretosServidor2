<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [
                'name' => 'Relatoría de Actos Administrativos',
                'slug' => 'actos-administrativos',
                'description' => 'Gestión de decretos y resoluciones administrativas',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'route_prefix' => 'dashboard',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Relatoría de Conceptos',
                'slug' => 'conceptos',
                'description' => 'Gestión de conceptos jurídicos y opiniones',
                'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                'route_prefix' => 'concepts',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Relatoría de Circulares',
                'slug' => 'circulares',
                'description' => 'Gestión de circulares institucionales',
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'route_prefix' => 'circulares',
                'order' => 3,
                'is_active' => false, // Actualmente es solo una vista estática
            ],
        ];

        foreach ($modules as $module) {
            Module::updateOrCreate(
                ['slug' => $module['slug']],
                $module
            );
        }
    }
}
