@extends('layouts.app')
@section('content')
    <div class="justify-content-center mt-2">
        <h1 class="text-center">Eventi trovati: {{ count($events) }}</h1>
        <div class="text-center">
            @auth
                <a class="btn btn-primary mb-2" href="{{ route('event.userEvents') }}">Vai ai tuoi eventi</a>
                <a class="btn btn-success mb-2" href="{{ route('event.create') }}">Crea un nuovo Evento</a>
            @endauth
        </div>
    </div>
    <div class="container d-flex flex-wrap">
        @foreach ($events as $event)
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body d-flex justify-content-between flex-column shadow-sm">
                    <h2 class="card-title text-center">[ {{ $event->id }} ] {{ $event->name }}</h2>
                    <p class="card-text mt-3">{{ $event->description }}</p>
                    <div class="text-center my-3">
                        <a href="{{ route('event.show', $event->id) }}" class="btn btn-primary">Mostra più dettagli</a>

                        @auth
                            @if (Auth::user()->id === $event->user_id)
                                <form action="{{ route('event.delete', $event->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Cancella Evento" class="btn btn-danger mt-2">
                                </form>

                                <a class="btn btn-warning mt-2" href="{{ route('event.edit', $event->id) }}">Modifica Evento</a>
                            @endif
                        @endauth

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
