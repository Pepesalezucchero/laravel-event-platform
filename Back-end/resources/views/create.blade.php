@extends('layouts.app')
@section('content')

<div class="text-center my-4">
    <h1>Nuovo evento</h1>
    <a class="btn btn-primary" href="{{route('event.welcome')}}">Torna alla HOME</a>
</div>

    <form action="{{ route('event.store') }}" method="POST" class="container text-center">

        @csrf
        @method('POST')

        <div class="shadow-sm card w-50 mx-auto mt-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Nome Evento</strong></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Inserisci Nome Evento">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label"><strong>Descrizione</strong></label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Descrizione evento">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label"><strong>Luogo</strong></label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="Inserisci il luogo dell'evento">
                </div>
                <div class="mb-3 text-center">
                    <label for="date" class="form-label"><strong>Inizio Evento</strong></label>
                    <br>
                    <input type="date" class="border border-secondary-subtle rounded" name="date" id="date">
                </div>
                <div class="mb-3 text-center">
                    <label for="{{Auth::user()->id}}" class="form-label"><strong>Organizzatore: </strong></label>
                    <h1>{{ Auth::user()->name }}</h1>
                </div>
                <div class="text-center">
                    <h3 class="mt-3 mb-2">Tags:</h3>
                    @foreach ($tags as $tag)
                        <div>
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id}}">
                            <label for="tag{{ $tag->id}}">{{ $tag->category }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <input class="my-1 btn btn-success mt-4" type="submit" value="Crea">
    </form>
@endsection
