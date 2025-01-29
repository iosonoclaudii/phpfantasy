@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="w-100 px-4"> <!-- Margine laterale -->
        <h1 class="mb-4 text-center text-primary">
            <i class="fas fa-thumbtack"></i> To-Do List
        </h1>

        <div class="text-center mb-4">
            <a href="{{ route('tasks.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i> Aggiungi Nuova Task
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10"> <!-- Margini interni più ampi -->
                @if ($tasks->isEmpty())
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle"></i> Nessuna task presente. Aggiungine una nuova!
                    </div>
                @else
                    <ul class="list-group">
                        @foreach ($tasks as $task)
                            <li class="list-group-item d-flex justify-content-between align-items-center shadow-sm">
                                <!-- Titolo e descrizione -->
                                <div>
                                    <h5 class="mb-1 text-primary">{{ $task->title }}</h5>
                                    <p class="mb-0 text-muted">{{ $task->description }}</p>
                                </div>
                                <!-- Bottone elimina -->
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Sei sicuro di voler eliminare questa task?')">
                                        <i class="fas fa-trash-alt"></i> Elimina
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
