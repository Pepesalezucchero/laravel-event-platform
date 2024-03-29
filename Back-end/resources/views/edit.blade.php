@extends('layouts.app')
@section('content')

    <div class="text-center my-4">
        <h1>Modifica evento [ {{ $event -> id}} ]</h1>
        <a class="btn btn-primary" href="{{route('event.welcome')}}">Torna alla HOME</a>
        <a href="{{ route('event.show', $event->id) }}" class="btn btn-primary">Torna ai dettagli</a>
    </div>

    <form action="" method="POST" class="container text-center">

        @csrf
        @method('PUT')

        <div class="shadow-sm card w-50 mx-auto mt-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Nome Evento</strong></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Inserisci Nome Evento" value="{{$event->name}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Descrizione</strong></label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Descrizione evento" value="{{$event->description}}">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label"><strong>Luogo</strong></label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="Inserisci il luogo dell'evento" value="{{$event->location}}">
                </div>
                <div class="mb-3 text-center">
                    <label for="date" class="form-label"><strong>Inizio Evento</strong></label>
                    <br>
                    <input type="date" class="border border-secondary-subtle rounded" name="date" id="date" value="{{$event->date}}">
                </div>
                <h3 class="mt-3 mb-2">Tags:</h3>
                @foreach ($tags as $tag)
                    <div>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id}}" value="{{$tag->category}}"
                        
                            @foreach ($event->tags as $eventTag)
                                @if ($eventTag->id == $tag->id)
                                    checked
                                @endif
                            @endforeach

                        >
                        <label for="tag{{ $tag->id}}">{{ $tag->category }}</label>
                    </div>  
                @endforeach
            </div>
        </div>

        <input class="my-1 btn btn-warning mt-4" type="submit" value="Modifica">
    </form>
@endsection
