@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Risultato</h1>
    <p>Hai scelto il bicchiere {{ $selectedCup }}.</p>
    <p>La pallina era sotto il bicchiere {{ $ballPosition }}.</p>

    @if ($result)
        <h2 class="text-success">Complimenti! Hai indovinato! 🎉</h2>
    @else
        <h2 class="text-danger">Peccato! Ritenta! 😔</h2>
    @endif

    <!-- Mostra lo score aggiornato -->
    <div class="mt-4">
        <h5>Punteggio aggiornato:</h5>
        <p>
            Risposte corrette: <strong>{{ $score->correct_guesses }}</strong><br>
            Tentativi totali: <strong>{{ $score->total_guesses }}</strong>
        </p>
    </div>

    <!-- Bottone per rigiocare -->
    <a href="{{ route('game.index') }}" class="btn btn-primary mt-4">Gioca di nuovo</a>
</div>
@endsection
