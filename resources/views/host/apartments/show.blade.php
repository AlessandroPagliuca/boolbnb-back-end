<!--Da modificare la route-->
{{-- <form action="{{ route('host.apartments.destroy', $apartment->slug) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-btn btn btn-danger m-1">Delete</button>
</form> --}}
@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="container show-container">
            <a class="" href="{{ route('host.apartments.index') }}"><button
                    class="btn btn-primary text-white rounded-circle fs-4">
                    <i class="fa-solid fa-arrow-left"></i></button>
            </a>
            <div class="d-flex align-items-center gap-1">
                <p class=" text-uppercase py-3 fs-1 m-0">{{ $apartment->title }}</p>
                <a class="btn btn-outline-primary btn-hover border-3 fw-semibold d-md-none"
                    href="{{ route('host.sponsorships.index', $apartment->slug) }}">
                    Add sponsor
                </a>
            </div>

            <div
                class="container-fluid py-4 mb-5 d-flex align-items-center justify-content-around bg-apartment text-center text-white d-none d-md-inline-flex">

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
                    <i class="fa-solid fa-bed"></i> {{ $apartment->beds }}
                </p>

                <p class="text-center m-0">BATHROOMS<br>
                    <i class="fa-solid fa-toilet"></i> {{ $apartment->bathrooms }}
                </p>

                <p class="text-center m-0 text-capitalize">ADDRESS<br>
                    {{ $apartment->address }}, {{ $apartment->city }}, <span
                        class=" d-none d-lg-block">{{ $apartment->zipcode }},</span>{{ $apartment->country }}
                </p>

                <p class="text-center m-0 text-capitalize d-none d-lg-block">LAST UPDATE<br>
                    {{ $apartment->updated_at }}
                </p>

                <div class=" d-flex justify-content-center">
                    <a class="btn btn-outline-primary btn-hover border-3 fw-semibold"
                        href="{{ route('host.sponsorships.index', $apartment->slug) }}">
                        Add sponsor
                    </a>
                </div>

            </div>

            <div class="row flex-column-reverse flex-md-row">

                <div class="col-12 col-md-6">
                    <div>
                        <p><span class="fw-bold text-uppercase">description</span><br>
                            {{ $apartment->description }}
                        </p>

                    </div>
                    <div class="d-md-none">
                        <p><span class="fw-bold">ROOMS</span><br>
                            <i class="fa-solid fa-person-shelter"></i> {{ $apartment->rooms }}
                        </p>

                        <p> <span class="fw-bold">BEDS</span><br>
                            <i class="fa-solid fa-bed"></i> {{ $apartment->rooms }}
                        </p>

                        <p><span class="fw-bold">BATHROOMS</span><br>
                            <i class="fa-solid fa-toilet"></i> {{ $apartment->bathrooms }}
                        </p>

                        <p><span class="fw-bold text-uppercase">address</span><br>
                            {{ $apartment->address }}, {{ $apartment->city }},
                            {{ $apartment->zipcode }},{{ $apartment->country }}
                        </p>
                        <p><span class="fw-bold text-uppercase">last update</span><br>
                            {{ $apartment->updated_at }}
                        </p>
                    </div>

                    <div>
                        <p><span class="fw-bold text-uppercase">Square meters</span><br>
                            {{ $apartment->square_meters }} mq.
                        </p>
                    </div>
                    <div>
                        <p><span class="fw-bold text-uppercase">Price for night</span><br>
                            {{ $apartment->price }} &euro;
                        </p>
                    </div>
                    <div>
                        @if ($apartment->services && count($apartment->services) > 0)
                            <div>
                                <p class="text-uppercase fw-bold fs-4 m-0">Services</p>
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
                    <div class="my-2">
                        @if ($apartment->sponsorships && count($apartment->sponsorships) > 0)
                            <div>
                                <p class="text-uppercase fw-bold fs-4 m-0">Sponsorship</p>
                                @foreach ($apartment->sponsorships as $sponsorship)
                                    <div>
                                        <span>{{ $sponsorship->name }}</span>
                                        <span>{{ $sponsorship->duration }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="mb-5">
                        @if (Str::startsWith($apartment->main_img, 'http'))
                            <img class="rounded-4 img-fluid" src="{{ $apartment->main_img }}"
                                alt="{{ $apartment->title }}">
                        @else
                            <img class="rounded-4 img-fluid"
                                src="{{ asset('storage/public/images/apartments/' . $apartment->main_img) }}"
                                alt="{{ $apartment->title }}">
                        @endif


                    </div>

                </div>

            </div>
            <div class=" d-flex">
                <a class="m-1 btn btn-success" href="{{ route('host.apartments.edit', $apartment->slug) }}">
                    Edit
                </a>
                {{-- <a class="m-1 btn btn-warning" href="{{ route('host.apartments.index') }}">
                    Go back
                </a> --}}
                <form action="{{ route('host.apartments.destroy', $apartment->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn btn btn-danger m-1" type="submit">Delete</button>
                </form>
            </div>
        </div>
        <!--Prova di recupero messaggio dal form nel front-end-->
        <div class="container">
            <h2>Messages</h2>
            <div class="row">
                <div class="col-lg-6">
                    @foreach ($apartment->messages as $message)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Email: {{ $message->email }}</h5>
                                <p class="card-text">Message: {{ $message->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
    @include('../../partials/modal')
@endsection
