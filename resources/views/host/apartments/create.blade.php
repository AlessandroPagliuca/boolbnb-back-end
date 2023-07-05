@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Add your apartments</h1>
        <form action="{{ route('host.apartments.store') }}" method="POST" enctype="multipart/form-data" id="apartmentForm">
            @csrf
            <!--Title-->
            <div class="mb-3 input-control">
                <label for="title">Title</label>
                <input minlength="3" maxlength="100" type="text" class="form-control @error('title') is-invalid

            @enderror" name="title"
                    id="title" value="{{ old('title') }}"  >

                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="titleError" class="error"></div>
            </div>
            <!-- MAIN Image-->
            <div class="mb-3">
                <label for="main_img" class="form-label">Insert main image</label>
                <input required class="form-control" type="file" id="main_img" name="main_img" >

            </div>
            <!--Description-->
            <div class="mb-3">
                <label for="description">Description</label>
                <input required type="text" class="form-control @error('description') is-invalid

            @enderror"
                    name="description" id="description" value="{{ old('description') }}" minlength="10">

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="descriptionError" class="error"></div>
            </div>
            <!--Rooms-->
            <div class="mb-3">
                <label for="rooms">Rooms</label>
                <input required type="number" class="form-control @error('rooms') is-invalid

            @enderror" name="rooms"
                    id="rooms" value="{{ old('rooms') }}" min="1" max="6">

                @error('rooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="roomsError" class="error"></div>
            </div>
            <!--Beds-->
            <div class="mb-3">
                <label for="beds">Beds</label>
                <input required type="number" class="form-control @error('beds') is-invalid

            @enderror" name="beds"
                    id="beds" value="{{ old('beds') }}" min="1" max="10">

                @error('beds')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="bedsError" class="error"></div>
            </div>
            <!--Bathrooms-->
            <div class="mb-3">
                <label for="bathrooms">Bathrooms</label>
                <input required type="number" class="form-control @error('bathrooms') is-invalid

            @enderror"
                    name="bathrooms" id="bathrooms" value="{{ old('bathrooms') }}" min="1" max="3">

                @error('bathrooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="bathroomsError" class="error"></div>
            </div>
            <!--Square meters-->
            <div class="mb-3">
                <label for="square_meters">Square meters</label>
                <input required type="number" class="form-control @error('square_meters') is-invalid

            @enderror"
                    name="square_meters" id="square_meters" value="{{ old('square_meters') }}"  min="0" max="500">

                @error('square_meters')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="squareMetersError" class="error"></div>
            </div>
            <!--ADDRESS-->
            <div class="mb-3">
                <label for="address">Address</label>
                <input required type="text" class="form-control @error('address') is-invalid

            @enderror"
                    name="address" id="address" value="{{ old('address') }}" minlength="3" maxlength="255">

                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="addressError" class="error"></div>
            </div>
            <!--CITY-->
            <div class="mb-3">
                <label for="city">City</label>
                <input required type="text" class="form-control @error('city') is-invalid

            @enderror" name="city"
                    id="city" value="{{ old('city') }}" minlength="3" maxlength="100">

                @error('city')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="cityError" class="error"></div>
            </div>
            <!--CITY-->
            <div class="mb-3">
                <label for="country">Country</label>
                <input required type="text" class="form-control @error('country') is-invalid

            @enderror"
                    name="country" id="country" value="{{ old('country') }}" minlength="1" maxlength="100">

                @error('country')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="countryError" class="error"></div>
            </div>
            <!--ZIPCODE-->
            <div class="mb-3">
                <label for="zipcode">Zipcode</label>
                <input required type="text" class="form-control @error('zipcode') is-invalid

            @enderror"
                    name="zipcode" id="zipcode" value="{{ old('zipcode') }}" minlength="1" maxlength="100">

                @error('zipcode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="zipcodeError" class="error"></div>
            </div>
            <!--Price per night-->
            <div class="mb-3">
                <label for="price">Price per night</label>
                <input required type="number" class="form-control @error('price') is-invalid
            @enderror" name="price"
                    id="price" value="{{ old('price') }}" min="1" max="99999">

                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="priceError" class="error"></div>
            </div>
            <div>
                <label for="visible">Visibility:</label>
                <input type="radio" id="visible" name="visible" value="1" checked>
                <label for="visible">Visible</label>

                <input type="radio" id="not-visible" name="visible" value="0">
                <label for="not-visible">Not Visible</label>
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

