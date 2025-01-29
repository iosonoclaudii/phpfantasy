<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Creature;

class CreatureSeeder extends Seeder
{
    public function run()
    {
        Creature::truncate();

        Creature::create([
            'name' => 'Pet 1',
            'hunger' => 100,
            'energy' => 100,
            'happiness' => 100,
            'status' => 'alive',
        ]);
    }
}
