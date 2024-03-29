@extends('layouts.app')
@section('content')
    @auth
        <h1 class="text-center">I tuoi Eventi</h1>
        <div class="text-center">
            <a class="btn btn-success mb-2" href="{{ route('event.create') }}">Crea un nuovo Evento</a>
        </div>
        <div class="container d-flex flex-wrap">
            @foreach ($events as $event)
                @if (Auth::user()->id === $event->user_id)
                    <div class="card m-2" style="width: 18rem;">
                        <div class="shadow-sm card-body d-flex justify-content-between flex-column">
                            <h2 class="card-title text-center">[ {{ $event->id }} ] {{ $event->name }}</h2>
                            <p class="card-text mt-3">{{ $event->description }}</p>
                            <div class="text-center my-3">
                                <a href="{{ route('event.show', $event->id) }}" class="btn btn-primary">Mostra più dettagli</a>
                                <form action="{{ route('event.delete', $event->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Cancella Evento" class="btn btn-danger mt-2">
                                </form>
                                <a class="btn btn-warning mt-2" href="{{ route('event.edit', $event->id) }}">Modifica Evento</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endauth
@endsection
