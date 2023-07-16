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
            <div class="d-flex align-items-center justify-content-between">
                <a class="" href="{{ route('host.apartments.index') }}"><button
                        class="btn btn-primary text-white rounded-circle fs-4">
                        <i class="fa-solid fa-arrow-left"></i></button>
                </a>

                <div class=" d-flex">
                    <a class="m-1 btn btn-success" href="{{ route('host.apartments.views', $apartment->slug) }}">
                        View Chart
                    </a>
                    <a class="m-1 btn btn-warning" href="{{ route('host.apartments.edit', $apartment->slug) }}">
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
            <div class="d-flex align-items-center gap-1">
                <p class="text-uppercase py-3 fs-1 m-0">{{ $apartment->title }}</p>
                <a class="btn btn-outline-primary btn-hover border-3 fw-semibold d-md-none"
                    href="{{ route('host.apartments.showpay', $apartment->slug) }}">
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

                <p class="text-center m-0 px-1">ROOMS<br>
                    <i class="fa-solid fa-person-shelter"></i> {{ $apartment->rooms }}
                </p>

                <p class="text-center m-0">BEDS<br>
                    <i class="fa-solid fa-bed"></i> {{ $apartment->beds }}
                </p>

                <p class="text-center m-0 px-1">BATHROOMS<br>
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
                        href="{{ route('host.apartments.showpay', $apartment->slug) }}">
                        Add sponsor
                    </a>
                </div>

            </div>

            <div class="row flex-column-reverse flex-md-row">

                <div class="col-12 col-md-6">
                    <div>
                        <h5 class="mb-2 fw-bold text-uppercase">description</h5>
                        <p>
                            {{ $apartment->description }}
                        </p>

                    </div>
                    <div class="d-md-none">
                        <h5 class="fw-bold mb-2">VISIBLE</h5>
                        <p>
                            @if ($apartment->visible)
                                Yes
                            @else
                                No
                            @endif
                        </p>
                        <h5 class="fw-bold mb-2">ROOMS</h5>
                        <p>
                            <i class="fa-solid fa-person-shelter"></i> {{ $apartment->rooms }}
                        </p>

                        <h5 class="fw-bold mb-2">BEDS</h5>
                        <p>
                            <i class="fa-solid fa-bed"></i> {{ $apartment->rooms }}
                        </p>

                        <h5 class="fw-bold mb-2">BATHROOMS</h5>
                        <p>
                            <i class="fa-solid fa-toilet"></i> {{ $apartment->bathrooms }}
                        </p>

                        <h5 class="fw-bold mb-2">address</h5>
                        <p>
                            {{ $apartment->address }}, {{ $apartment->city }},
                            {{ $apartment->zipcode }},{{ $apartment->country }}
                        </p>
                        <h5 class="fw-bold text-uppercase">last update</h5>
                        <p>
                            {{ $apartment->updated_at }}
                        </p>
                    </div>

                    <div>
                        <h5 class="fw-bold text-uppercase">Square meters</h5>
                        <p>
                            {{ $apartment->square_meters }} mq.
                        </p>
                    </div>
                    <div>
                        <h5 class="fw-bold text-uppercase">Price for night</h5>
                        <p>
                            {{ $apartment->price }} &euro;
                        </p>
                    </div>
                    <div>
                        @if ($apartment->services && count($apartment->services) > 0)
                            <div>
                                <p class="text-uppercase fw-bold fs-4 m-0">Services</p>
                                @foreach ($apartment->services as $service)
                                    <div>
                                        <i style="width: 30px" class="fa-solid fa-{{ $service->icon }} px-2"></i>
                                        <span>{{ $service->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="my-3">
                        @if ($apartment->sponsorships && count($apartment->sponsorships) > 0)
                            <div>
                                @foreach ($apartment->sponsorships as $sponsorship)
                                    <p class="text-uppercase fw-bold fs-4 m-0 mb-1">Sponsorship
                                        @if ($sponsorship->name === 'Base')
                                            <i class="fa-solid fa-crown text-copper"></i>
                                        @elseif ($sponsorship->name === 'Medium')
                                            <i class="fa-solid fa-crown text-silver"></i>
                                        @elseif ($sponsorship->name === 'Premium')
                                            <i class="fa-solid fa-crown text-warning"></i>
                                        @endif
                                    </p>

                                    <div>
                                        <p>Sponsor type: {{ $sponsorship->name }}</p>
                                        <p>Start Date:
                                            {{ \Carbon\Carbon::parse($sponsorship->pivot->start_date)->format('Y-m-d H:i:s') }}
                                        </p>
                                        <p>End Date:
                                            {{ \Carbon\Carbon::parse($sponsorship->pivot->end_date)->format('Y-m-d H:i:s') }}
                                        </p>

                                        @if (\Carbon\Carbon::parse($sponsorship->pivot->end_date)->isPast())
                                            <span class="text-danger">Your sponsorship has expired</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>





                </div>

                <div class="col-12 col-md-6">
                    <div class="mb-5 shadow rounded-4">
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
            <hr>
        </div>
        <!--Prova di recupero messaggio dal form nel front-end-->
        <div class="container">
            <h2 class="mb-3">Messages</h2>
            <div class="row">
                @if (count($apartment->messages) > 0)
                    @foreach ($apartment->messages as $message)
                        <div class="col-lg-6 mb-3">
                            <div class="card my-3 shadow">
                                <div class="card-body">
                                    <h5 class="card-title">Email: {{ $message->email }}</h5>
                                    <p class="card-text">Message: {{ $message->message }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <em class="mb-3">no messages for you</em>
                @endif
            </div>
        </div>


    </div>
    @include('../../partials/modal')
@endsection
