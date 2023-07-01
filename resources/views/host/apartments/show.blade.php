<!--Da modificare la route-->
{{-- <form action="{{ route('host.apartments.destroy', $apartment->slug) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-btn btn btn-danger m-1">Delete</button>
</form> --}}
@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold fs-2 py-4">Nome appartamento: {{ $apartment->title }}</h1>

                </div>
                <div class="col-12">
                    <p class="badge badge-pill bg-dark p-2">Descrizione: {{ $apartment->description }}</p>

                </div>
                <div class="col-12">
                    <p class="badge badge-pill bg-dark  p-2">Camere: {{ $apartment->rooms }}</p>

                </div>
                <div class="col-12">
                    <p class="badge badge-pill bg-dark p-2">Posti letto: {{ $apartment->beds }}</p>

                </div>
                <div class="col-12">
                    <p class="badge badge-pill bg-dark p-2">Bagni: {{ $apartment->bathrooms }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Metri quadrati: {{ $apartment->square_meters }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Indirizzo: {{ $apartment->address }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Latitudine: {{ $apartment->latitude }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Longitudine: {{ $apartment->longitude }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Visibilità: {{ $apartment->visible }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Prezzo per notte: {{ $apartment->price }}</p>

                </div>
                {{-- <div class="col-12">
                    <p class="badge badge-pill bg-dark text-uppercase p-2">Main Weapon:
                        {{ $apartment->main_weapon }}</p>

                </div>
                <div class="col-12">
                    <p class="badge badge-pill bg-dark text-uppercase p-2">Type:
                        {{ $apartment->type ? $apartment->type->name : 'No tech specified' }}</p>

                </div>
                <div class="col-12">

                @if ($apartment->weapons && count($apartment->weapons) > 0)
                    <div>
                        @foreach ($apartment->weapons as $weapon)
                            <p class="badge rounded-pill bg-primary text-white">{{ $weapon->name }}</p>
                        @endforeach
                    </div>
                @endif

                </div> --}}

                <div class="col-12">
                    <a class="m-1 btn btn-success" href="{{ route('host.apartments.edit', $apartment->slug) }}">
                        Edit
                    </a>
                    <a class="m-1 btn btn-warning" href="{{ route('host.apartments.index') }}">
                        Go back
                    </a>
                    <form action="{{ route('host.apartments.destroy', $apartment->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-1" type="submit">Delete</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @include('../../partials/modal')
@endsection
