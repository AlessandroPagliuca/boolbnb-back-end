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
            <p class=" text-uppercase py-3 fs-1">{{ $apartment->title }}</p>
            <div
                class="container-fluid py-4 d-flex align-items-center justify-content-around bg-apartment text-center text-white">

                <p class="text-center m-0">VISIBLE<br>
                    @if ($apartment->visible)
                        Yes
                    @else
                        No
                    @endif
                </p>

                <p class="text-center m-0">ROOMS<br>
                    <i class="fa-solid fa-person-shelter"></i> {{ $apartment->rooms }}
                </p>

                <p class="text-center m-0">BEDS<br>
                    <i class="fa-solid fa-bed"></i> {{ $apartment->rooms }}
                </p>

                <p class="text-center m-0">BATHROOMS<br>
                    <i class="fa-solid fa-toilet"></i> {{ $apartment->bathrooms }}
                </p>

                <p class="text-center m-0 text-capitalize">ADDRESS<br>
                    {{ $apartment->address }}, {{ $apartment->city }}, {{ $apartment->zipcode }}, {{ $apartment->country }}
                </p>

                <p class="text-center m-0 text-capitalize">LAST UPDATE<br>
                    {{ $apartment->updated_at }}
                </p>

                <div class=" d-flex justify-content-center">
                    <a class="btn btn-outline-primary btn-hover border-3 fw-semibold"
                        href="{{ route('host.sponsorships.index', $apartment->slug) }}">
                        Add sponsor
                    </a>
                </div>

            </div>
            <div class="row">
                <div class="col-12 my-3">
                    @if (Str::startsWith($apartment->main_img, 'http'))
                        <img style="width: 275px; height:275px; object-fit:cover;" class="rounded-4"
                            src="{{ $apartment->main_img }}" alt="{{ $apartment->title }}">
                    @else
                        <img style="width: 275px; height:275px; object-fit:cover;" class="rounded-4"
                            src="{{ asset('storage/public/images/apartments/' . $apartment->main_img) }}"
                            alt="{{ $apartment->title }}">
                    @endif


                </div>
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
                    <p class="badge badge-pill bg-dark p-2">Visible: {{ $apartment->visible }}</p>

                </div>
                <div class="col-12 ">
                    <p class="badge badge-pill bg-dark p-2">price per night: {{ $apartment->price }}</p>

                </div>
                <div>
                    @if ($apartment->services && count($apartment->services) > 0)
                        <div>
                            @foreach ($apartment->services as $service)
                                <div>
                                    <span>{{ $service->name }}</span>
                                    @if ($service->icon == 'instagram fa-rotate-180')
                                        <i class="fa-brands fa-{{ $service->icon }} px-2"></i>
                                    @else
                                        <i class="fa-solid fa-{{ $service->icon }} px-2"></i>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div>
                    @if ($apartment->sponsorships && count($apartment->sponsorships) > 0)
                        <div>
                            @foreach ($apartment->sponsorships as $sponsorship)
                                <div>
                                    <span>{{ $sponsorship->name }}</span>
                                    <span>{{ $sponsorship->duration }}</span>
                                    <span>{{ $sponsorship->description }}</span>
                                    <span>{{ $sponsorship->price }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

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
                        <button class="delete-btn btn btn-danger m-1" type="submit">Delete</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @include('../../partials/modal')
@endsection
