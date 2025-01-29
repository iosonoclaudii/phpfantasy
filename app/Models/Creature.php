<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creature extends Model
{
    protected $fillable = ['name', 'hunger', 'energy', 'happiness', 'status'];

    // Metodo per verificare se è viva
    public function isAlive()
    {
        return $this->status === 'alive';
    }
}
