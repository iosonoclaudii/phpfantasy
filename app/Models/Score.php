<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    /**
     * I campi che possono essere riempiti tramite Mass Assignment.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'correct_guesses',
        'total_guesses',
    ];

    /**
     * Relazione con il modello User.
     * Ogni punteggio appartiene a un utente.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
