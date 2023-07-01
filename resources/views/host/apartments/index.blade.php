@extends('layouts.app')

@section('content')
    <div class="bg-team">
        <h1 class=" text-center text-white text-uppercase p-4">apartments Cards</h1>
        <div class="container">
            <div class="text-center m-5">
                <a class="btn btn-success" href="{{ route('host.apartments.create') }}">Crea nuovo apartments</a>
            </div>
            <div class="row">
                @foreach ($apartments as $apartment)
                    <div class="col-4">
                        <div class="card card-bg mb-3 shadow">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h4 class="fs-4 card-title fw-bold text-center text-capitalize py-2">
                                        {{ $apartment->title }}</h4>
                                </div>
                                <div class="col-3">
                                    <p class="card-text">price: {{ $apartment->price }}&euro;</p>
                                </div>

                            </div>

                            <div>
                                <img class="img-fluid" src="{{ $apartment->main_img }}" alt="caio">
                            </div>

                            <div class="card-body">

                                <p class="card-text"><span class="fw-bold text-capitalize">description:</span>
                                    {{ $apartment->description }}</p>
                                <p class="card-text"><span class="fw-bold text-capitalize">rooms:</span>
                                    {{ $apartment->rooms }}</p>
                                <p class="card-text"><span class="fw-bold text-capitalize">beds:</span>
                                    {{ $apartment->beds }}</p>
                                <p class="card-text"> <span class="fw-bold text-capitalize">bathrooms:</span>
                                    {{ $apartment->bathrooms }} </p>
                                <p class="card-text"><span class="fw-bold text-capitalize">square meters: </span>
                                    {{ $apartment->square_meters }}
                                </p>
                                <p class="card-text"><span class="fw-bold text-capitalize">address:</span>
                                    {{ $apartment->address }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="m-1" href="{{ route('host.apartments.show', $apartment->slug) }}">
                                        <button class="btn btn-warning"> Show</button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{ $apartments->links('vendor.pagination.bootstrap-5') }}
@endsection
