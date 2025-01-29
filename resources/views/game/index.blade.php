@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Indovina dove si trova la pallina!</h1>
    <p>Scegli uno dei 3 bicchieri:</p>

    <!-- Mostra lo score dell'utente -->
    <div class="mb-4">
        <h5>Punteggio:</h5>
        <p>
            Risposte corrette: <strong>{{ $score->correct_guesses }}</strong><br>
            Tentativi totali: <strong>{{ $score->total_guesses }}</strong>
        </p>
    </div>

    <!-- Bicchieri -->
    <form action="{{ route('game.guess') }}" method="POST">
        @csrf
        <div class="d-flex justify-content-center">
            <!-- Bicchiere 1 -->
            <button type="submit" name="cup" value="1" class="btn-game">
                <img src="{{ asset('images/cup.png') }}" alt="Bicchiere 1" width="100">
                <p>Bicchiere 1</p>
            </button>
            <!-- Bicchiere 2 -->
            <button type="submit" name="cup" value="2" class="btn-game">
                <img src="{{ asset('images/cup.png') }}" alt="Bicchiere 2" width="100">
                <p>Bicchiere 2</p>
            </button>
            <!-- Bicchiere 3 -->
            <button type="submit" name="cup" value="3" class="btn-game">
                <img src="{{ asset('images/cup.png') }}" alt="Bicchiere 3" width="100">
                <p>Bicchiere 3</p>
            </button>
        </div>
    </form>

    <!-- Bottone per tornare alla dashboard -->
    <div class="mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Torna alla Dashboard</a>
    </div>
</div>
@endsection
