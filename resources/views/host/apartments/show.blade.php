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
                    <h1 class="fw-bold fs-2 py-4">Name apartment: {{ $apartment->title }}</h1>

                </div>
                <div class="col-12">
                    <p class="badge badge-pill bg-dark p-2">Description: {{ $apartment->description }}</p>

                </div>
                <div class="col-12">
                    <p class="badge badge-pill bg-dark  p-2">Rooms: {{ $apartment->rooms }}</p>

                </div>
                <div class="col-12">
                    <p class="badge badge-pill bg-dark p-2">Beds: {{ $apartment->beds }}</p>

                </div>
                <div class="col-12">
                    <p class="badge badge-pill bg-dark p-2">Bathrooms: {{ $apartment->bathrooms }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Square meters: {{ $apartment->square_meters }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Address: {{ $apartment->address }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Latitude: {{ $apartment->latitude }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Longitude: {{ $apartment->longitude }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">Visible: {{ $apartment->visible }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">price per night: {{ $apartment->price }}</p>

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
