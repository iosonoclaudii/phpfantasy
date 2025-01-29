<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * I campi che possono essere riempiti tramite Mass Assignment.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'completed',
    ];

    /**
     * Relazione con il modello User.
     * Ogni Task appartiene a un singolo utente.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
