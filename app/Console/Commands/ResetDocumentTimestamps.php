<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class ResetDocumentTimestamps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documents:reset-timestamps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resetear las fechas updated_at de los documentos que no han sido editados';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Iniciando reseteo de timestamps de documentos...');

        // Contar documentos afectados
        $total = Document::whereColumn('updated_at', '>', 'created_at')->count();

        if ($total == 0) {
            $this->info('No hay documentos con timestamps modificados.');
            return 0;
        }

        $this->info("Se encontraron {$total} documentos con updated_at diferente a created_at.");

        if (!$this->confirm('¿Deseas resetear el updated_at de estos documentos a su created_at?')) {
            $this->info('Operación cancelada.');
            return 0;
        }

        // Actualizar los documentos sin disparar eventos
        $updated = DB::table('documents')
            ->whereColumn('updated_at', '>', 'created_at')
            ->update(['updated_at' => DB::raw('created_at')]);

        $this->info("✓ Se resetearon {$updated} documentos exitosamente.");
        $this->info('Ahora el campo "Última Modificación" mostrará la fecha de creación hasta que sean editados por un admin.');

        return 0;
    }
}
