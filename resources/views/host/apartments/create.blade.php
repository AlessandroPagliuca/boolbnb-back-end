@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Add your apartments</h1>
        <form action="{{ route('host.apartments.store') }}" method="POST">
            @csrf
            <!--Title-->
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid

            @enderror" name="title"
                    id="title" value="{{ old('title') }}">

                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- MAIN Image-->
            <div class="mb-3">
                <label for="main_img">Image</label>
                <input type="text"
                    class="form-control @error('main_img') is-invalid
            {{-- cambiare text in file  --}}
             @enderror"
                    name="main_img" id="main_img" value="{{ old('main_img') }}">

                @error('main_img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--Description-->
            <div class="mb-3">
                <label for="description">Description</label>
                <input type="text" class="form-control @error('description') is-invalid

            @enderror"
                    name="description" id="description" value="{{ old('description') }}">

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--Rooms-->
            <div class="mb-3">
                <label for="rooms">Rooms</label>
                <input type="number" class="form-control @error('rooms') is-invalid

            @enderror" name="rooms"
                    id="rooms" value="{{ old('rooms') }}">

                @error('rooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--Beds-->
            <div class="mb-3">
                <label for="beds">Beds</label>
                <input type="number" class="form-control @error('beds') is-invalid

            @enderror" name="beds"
                    id="beds" value="{{ old('beds') }}">

                @error('beds')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--Bathrooms-->
            <div class="mb-3">
                <label for="bathrooms">Bathrooms</label>
                <input type="number" class="form-control @error('bathrooms') is-invalid

            @enderror"
                    name="bathrooms" id="bathrooms" value="{{ old('bathrooms') }}">

                @error('bathrooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--Square meters-->
            <div class="mb-3">
                <label for="square_meters">Square meters</label>
                <input type="number" class="form-control @error('square_meters') is-invalid

            @enderror"
                    name="square_meters" id="square_meters" value="{{ old('square_meters') }}">

                @error('square_meters')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--ADDRESS-->
            <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control @error('address') is-invalid

            @enderror"
                    name="address" id="address" value="{{ old('address') }}">

                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--CITY-->
            <div class="mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control @error('city') is-invalid

            @enderror" name="city"
                    id="city" value="{{ old('city') }}">

                @error('city')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--CITY-->
            <div class="mb-3">
                <label for="country">Country</label>
                <input type="text" class="form-control @error('country') is-invalid

            @enderror"
                    name="country" id="country" value="{{ old('country') }}">

                @error('country')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--ZIPCODE-->
            <div class="mb-3">
                <label for="zipcode">Zipcode</label>
                <input type="text" class="form-control @error('zipcode') is-invalid

            @enderror"
                    name="zipcode" id="zipcode" value="{{ old('zipcode') }}">

                @error('zipcode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--Price per night-->
            <div class="mb-3">
                <label for="price">Price per night</label>
                <input type="number" class="form-control @error('price') is-invalid
            @enderror" name="price"
                    id="price" value="{{ old('price') }}">

                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--services-->
            <div class="form-group">
                <p class="text-dark">Select one or more services:</p>
                @foreach ($services as $service)
                    <div class="text-dark">
                        <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input"
                            {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                        <label for="services[]" class="form-check-label">{{ $service->name }}</label>
                        @if ($service->icon == 'instagram fa-rotate-180')
                            <i class="fa-brands fa-{{ $service->icon }} px-2"></i>
                        @else
                            <i class="fa-solid fa-{{ $service->icon }} px-2"></i>
                        @endif
                    </div>
                @endforeach
                @error('services')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!--sponsorships-->
            <div class="form-group">
                <p class="text-dark">Select your sponsorship:</p>
                @foreach ($sponsorships as $sponsorship)
                    <div class="text-dark">
                        <input type="checkbox" name="sponsorships[]" value="{{ $sponsorship->id }}"
                            class="form-check-input"
                            {{ in_array($sponsorship->id, old('sponsorships', [])) ? 'checked' : '' }}>
                        <label for="sponsorships[]" class="form-check-label">{{ $sponsorship->name }}
                            {{ $sponsorship->price }} {{ $sponsorship->duration }}
                            {{ $sponsorship->description }}</label>
                    </div>
                @endforeach
                @error('sponsorships')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!--btn save and reset-->
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
@endsection
