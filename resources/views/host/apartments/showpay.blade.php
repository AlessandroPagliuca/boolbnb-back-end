@extends('layouts.app')

@section('content')
    <section>
        <div class="wave-black fa-rotate-180"> </div>

        <div class="bg-pink text-white d-flex align-items-center justify-content-center flex-column" style="height: 300px">
            <a class="" href="{{ route('host.apartments.index') }}"><button
                    class="btn btn-light text-primary rounded-circle fs-4">
                    <i class="fa-solid fa-arrow-left"></i></button>
            </a>
            <h1 class="text-uppercase text-center py-3">choose the sponsorship that best suits you</h1>

        </div>
        <div class="wave fa-rotate-180">

        </div>

    </section>
    <section>
        <div class="bg-black text-white d-flex align-items-center justify-content-center py-5">
            <div class="row container-fluid">
                @foreach ($sponsorships as $sponsor)
                    <div class="col-12 col-lg-6 col-xl-4 d-flex justify-content-center align-items-center m-auto">
                        <div class="card card-sponsor bg-dark-card text-white my-5 mx-0 mx-sm-5 mx-lg-0">
                            <div class="border-bottom">
                                <div class="m-auto d-flex align-content-center flex-column justify-content-center p-5">
                                    <img class="m-auto" src="{{ asset('/img/logo-boolbnb.png') }}"
                                        style="width: 50px; height: 50px; object-fit:cover;" alt="logo"></a>
                                    <p class="text-uppercase fs-3 m-0 m-auto pb-1 fw-semibold">boolbnb plus</p>
                                    <p
                                        class=" fs-small text-uppercase fit-content m-0 m-auto border border-3 border-white px-2">
                                        {{ $sponsor->name }}</p>
                                </div>
                            </div>

                            <div class="card-body bg-dark-card ">
                                <h5 class="card-title text-uppercase text-center pb-2">sponsor the apartment</h5>
                                <p class="card-text px-3">{{ $sponsor->description }}</p>
                            </div>

                            <div class="border-top text-center py-4 px-5">
                                <p class="pt-3 fs-3">{{ $sponsor->name }} {{ $sponsor->duration }} hours</p>
                                <p class=" m-0">Sponsor your appartment NOW</p>
                                <p class=" fs-5 fw-semibold">
                                    @if ($sponsor->name == 'Premium')
                                        <span class=" fw-light fs-6 text-decoration-line-through">11.99&euro;</span>
                                    @endif
                                    @if ($sponsor->name == 'Medium')
                                        <span class=" fw-light fs-6 text-decoration-line-through">8.99&euro;</span>
                                    @endif{{ $sponsor->price }}&euro;
                                </p>
                                <a class="text-white text-decoration-none"
                                    href="{{ route('host.apartments.payment', ['slug' => $apartment->slug, 'id' => $sponsor->id]) }}">
                                    <button class="btn btn-success text-uppercase fw-semibold">sponsor for
                                        {{ $sponsor->price }}&euro;</button>
                                </a>



                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
