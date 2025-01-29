<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Creature;

class UpdateCreatureStats extends Command
{
    protected $signature = 'creature:update-stats';
    protected $description = 'Aggiorna automaticamente le statistiche della creatura ogni minuto.';

    public function handle()
    {
        $creature = Creature::first();

        if ($creature && $creature->status === 'alive') {
            $creature->update([
                'hunger' => max(0, $creature->hunger - 2),
                'energy' => max(0, $creature->energy - 2),
                'happiness' => max(0, $creature->happiness - 2),
            ]);

            // Controlla se la creatura è morta
            if ($creature->hunger <= 0 || $creature->energy <= 0 || $creature->happiness <= 0) {
                $creature->update(['status' => 'dead']);
            }

            $this->info('Statistiche della creatura aggiornate.');
        } else {
            $this->info('Nessuna creatura viva da aggiornare.');
        }
    }
}
