<?php

namespace App\Http\Controllers;

use App\Models\Creature;
use Illuminate\Http\Request;

class CreatureController extends Controller
{
    /**
     * Mostra la pagina della creatura.
     */
    public function index()
    {
        $creature = Creature::first();

        if (!$creature) {
            return redirect()->back()->with('error', 'Nessuna creatura trovata.');
        }

        return view('creature.index', compact('creature'));
    }

    /**
     * Nutre la creatura.
     */
    public function feed()
    {
        $creature = Creature::first();

        if ($creature->isAlive()) {
            $creature->update([
                'hunger' => min(100, $creature->hunger + 20),  // Aumenta la fame
                'happiness' => max(0, $creature->happiness - 10), // Riduce felicità
            ]);

            $this->checkIfCreatureIsDead($creature); // Controlla se la creatura è morta
        }

        return redirect()->route('creature.index');
    }

    /**
     * Permette alla creatura di giocare.
     */
    public function play()
    {
        $creature = Creature::first();

        if ($creature->isAlive()) {
            $creature->update([
                'happiness' => min(100, $creature->happiness + 15), // Aumenta felicità
                'energy' => max(0, $creature->energy - 10),         // Riduce energia
            ]);

            $this->checkIfCreatureIsDead($creature); // Controlla se la creatura è morta
        }

        return redirect()->route('creature.index');
    }

    /**
     * Permette alla creatura di dormire.
     */
    public function sleep()
    {
        $creature = Creature::first();

        if ($creature->isAlive()) {
            $creature->update([
                'energy' => min(100, $creature->energy + 30),   // Aumenta energia
                'hunger' => max(0, $creature->hunger - 10),     // Riduce fame
            ]);

            $this->checkIfCreatureIsDead($creature); // Controlla se la creatura è morta
        }

        return redirect()->route('creature.index');
    }

    /**
     * Reset della creatura allo stato iniziale.
     */
    public function reset()
    {
        $creature = Creature::first();

        if ($creature) {
            $creature->update([
                'hunger' => 100,         // Fame iniziale
                'energy' => 100,         // Energia iniziale
                'happiness' => 100,      // Felicità iniziale
                'status' => 'alive',     // Stato vivo
            ]);

            return redirect()->route('creature.index')->with('success', 'La creatura è stata resettata.');
        }

        return redirect()->route('creature.index')->with('error', 'Nessuna creatura trovata da resettare.');
    }

    /**
     * Controlla se la creatura è morta e aggiorna il suo stato.
     *
     * @param Creature $creature
     */
    private function checkIfCreatureIsDead(Creature $creature)
    {
        if ($creature->hunger <= 0 || $creature->energy <= 0 || $creature->happiness <= 0) {
            $creature->update(['status' => 'dead']);
            session()->flash('error', 'La creatura è morta.');
        }
    }
}
