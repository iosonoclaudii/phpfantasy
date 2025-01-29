<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;


class GameController extends Controller
{
    public function index()
{
    // Recupera o crea il punteggio per l'utente autenticato
    $score = Score::firstOrCreate(
        ['user_id' => Auth::id()],
        ['correct_guesses' => 0, 'total_guesses' => 0]
    );

    // Passa la variabile $score alla vista
    return view('game.index', compact('score'));
}

public function guess(Request $request)
{
    $selectedCup = $request->input('cup'); // Bicchiere scelto dall'utente
    $ballPosition = random_int(1, 3); // Posizione casuale della pallina

    // Recupera o crea il punteggio dell'utente
    $score = Score::firstOrCreate(
        ['user_id' => Auth::id()],
        ['correct_guesses' => 0, 'total_guesses' => 0]
    );

    // Incrementa i tentativi totali
    $score->total_guesses += 1;

    // Se l'utente ha indovinato, incrementa le risposte corrette
    $result = $selectedCup == $ballPosition;
    if ($result) {
        $score->correct_guesses += 1;
    }

    $score->save(); // Salva lo score aggiornato

    // Passa tutte le variabili alla vista
    return view('game.result', [
        'selectedCup' => $selectedCup,
        'ballPosition' => $ballPosition,
        'result' => $result,
        'score' => $score, // Passa $score alla vista
    ]);
}

}
