@extends('layouts.app')

@section('content')
<div class="container text-center">
    <!-- Mostra i messaggi flash -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>{{ $creature->name }}</h1>

    @if ($creature->isAlive())
        <p><strong>Fame:</strong> {{ $creature->hunger }}</p>
        <p><strong>Energia:</strong> {{ $creature->energy }}</p>
        <p><strong>Felicità:</strong> {{ $creature->happiness }}</p>

        <form action="{{ route('creature.feed') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Nutri</button>
        </form>

        <form action="{{ route('creature.play') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-warning">Gioca</button>
        </form>

        <form action="{{ route('creature.sleep') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-primary">Fai Dormire</button>
        </form>
    @else
        <h2 class="text-danger">La creatura è morta</h2>

        <form action="{{ route('creature.reset') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-secondary">Resetta la Creatura</button>
        </form>
    @endif
</div>
@endsection
