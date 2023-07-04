@extends('layouts.app')

@section('content')
    <div class="list-group text-bg-dark">

        @foreach ($apartments as $apartment)
            <a href="{{ route('host.apartments.show', $apartment->slug) }}" class="text-decoration-none text-dark w-100">
                <li class="list-group-item list-group-item-action">

                    <div class="d-flex align-items-center justify-content-between">

                        <div class=" d-flex align-items-center gap-4">

                            <p class="m-0 fw-bold">{{ $apartment->id }}</p>
                            <img class="rounded-3" style="width:100px" src="{{ $apartment->main_img }}"
                                alt="{{ $apartment->slug }}">
                            <p class="m-0 d-none d-md-block">{{ $apartment->title }}</p>
                            <p class="m-0">{{ $apartment->created_at }}</p>

                        </div>

                        <div class=" d-flex align-items-center">
                            <a class="m-1 btn btn-success" href="{{ route('host.apartments.edit', $apartment->slug) }}">
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
                </li>
            </a>
        @endforeach
    </div>
    <div class="container-fluid pt-4">
        {{ $apartments->links('vendor.pagination.bootstrap-5') }}
    </div>

    <div class=" d-flex justify-content-center">
        <a class="btn btn-primary text-white fw-semibold" href="{{ route('host.apartments.create') }}">
            Add annoucment
        </a>
    </div>

    @include('../../partials/modal')
@endsection
