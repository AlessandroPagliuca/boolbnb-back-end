@extends('layouts.app')

@section('content')
    <div class="apartment-vh">
        <div class="container-fluid py-4 d-flex align-items-center justify-content-between bg-apartment">
            <p class="m-0 text-white">
                Hi
                @if (empty(Auth::user()->name) && empty(Auth::user()->surname))
                    <span>User</span>
                @else
                    <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                @endif
                , welcome to your personal area
            </p>

            <div class=" d-flex justify-content-center">
                <a class="btn btn-outline-primary btn-hover border-3 fw-semibold"
                    href="{{ route('host.apartments.create') }}">
                    Add annoucment
                </a>
            </div>
        </div>

        <div class="list-group">

            @foreach ($apartments as $apartment)
                <a href="{{ route('host.apartments.show', $apartment->slug) }}" class="text-decoration-none text-dark w-100">
                    <li class="list-group-item list-group-item-action">

                        <div class="d-flex align-items-center justify-content-between">
                            {{-- SINISTRA --}}


                            <div class=" d-flex align-items-center gap-4 ">


                                <p class="m-0 fw-bold" style="width:15px">{{ $apartment->id }}</p>

                                <div class="d-flex align-items-center gap-4 flex-column flex-sm-row">
                                    @if (Str::startsWith($apartment->main_img, 'http'))
                                        <img class="rounded-3" style="width:100px" src="{{ $apartment->main_img }}"
                                            alt="Apartment Image">
                                    @else
                                        <img class="rounded-3" style="width:100px"
                                            src="{{ asset('storage/public/images/apartments/' . $apartment->main_img) }}"
                                            alt="Apartment Image">
                                    @endif
                                    <p class="m-0 d-none d-md-block text-overflow">{{ $apartment->title }}</p>
                                    <p class="m-0">{{ $apartment->created_at }}</p>
                                </div>

                            </div>

                            {{-- BUTTON --}}
                            <div class=" d-flex align-items-center justify-content-end">

                                <div class=" d-sm-flex">
                                    <a class="m-1 btn btn-success"
                                        href="{{ route('host.apartments.views', $apartment->slug) }}">
                                        <i class="fa-solid fa-chart-line"></i>
                                    </a>

                                    <!--DA RIVEDERE-->
                                    <a class="m-1 btn btn-success"
                                        href="{{ route('host.apartments.showpay', $apartment->slug) }}">
                                        <i class="fa-solid fa-money-bills"></i>
                                    </a>
                                </div>

                                <div class=" d-sm-flex">
                                    <a class="m-1 btn btn-warning"
                                        href="{{ route('host.apartments.edit', $apartment->slug) }}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>

                                    <form action="{{ route('host.apartments.destroy', $apartment->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-btn btn btn-danger m-1" type="submit"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </div>


                            </div>

                        </div>
                    </li>
                </a>
            @endforeach
        </div>
        <div class="container-fluid pt-4">
            {{ $apartments->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>




    @include('../../partials/modal')
@endsection
