@extends('layouts.app')

@section('content')
    <div class="container">


        <h1>Edit your apartment: {{ $apartment->title }}</h1>
        <a class="m-1" href="{{ route('host.apartments.show', $apartment->slug) }}"><button class="btn btn-warning">
                Show</button></a>

        <form action="{{ route('host.apartments.update', $apartment->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="fw-bold">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    id="title" value="{{ old('title', $apartment->title) }}"  minlength="3" maxlength="100" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="main_img" class="form-label">Insert main image</label>
                <input class="form-control" type="file" id="main_img" name="main_img">
            </div>
            <div class="mb-3">
                <label for="description" class="fw-bold">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                    id="description" value="{{ old('description', $apartment->description) }}"  minlength="10" required>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
            <label for="visible">Visibilità</label>
            <input type="text" class="form-control @error('visible') is-invalid @enderror" name="visible"
                id="visible" value="{{ old('visible', $apartment->visible) }}">
            @error('visible')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> 
            <div class="mb-3">
                <label for="rooms" class="fw-bold">Rooms</label>
                <input type="text" class="form-control @error('rooms') is-invalid @enderror" name="rooms"
                    id="rooms" value="{{ old('rooms', $apartment->rooms) }}" min="1" max="6" required>
                @error('rooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="beds" class="fw-bold">Beds</label>
                <input type="text" class="form-control @error('beds') is-invalid @enderror" name="beds" id="beds"
                    value="{{ old('beds', $apartment->beds) }}" min="1" max="10" required>
                @error('beds')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bathrooms" class="fw-bold">Bathrooms</label>
                <input type="text" class="form-control @error('bathrooms') is-invalid @enderror" name="bathrooms"
                    id="bathrooms" value="{{ old('bathrooms', $apartment->bathrooms) }}" min="1" max="3" required>
                @error('bathrooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="square_meters" class="fw-bold">Square meters (m²)</label>
                <input type="text" class="form-control @error('square_meters') is-invalid @enderror" name="square_meters"
                    id="square_meters" value="{{ old('square_meters', $apartment->square_meters) }}" min="0" max="500" required>
                @error('square_meters')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="fw-bold">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                    id="address" value="{{ old('address', $apartment->address) }}" minlength="3" maxlength="255" required>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!--City-->
            <div class="mb-3">
                <label for="city" class="fw-bold">City</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city"
                    value="{{ old('city', $apartment->city) }}" minlength="3" maxlength="100" required>
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!--country-->
            <div class="mb-3">
                <label for="country" class="fw-bold">Country</label>
                <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                    id="country" value="{{ old('country', $apartment->country) }}" minlength="1" maxlength="100" required>
                @error('country')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!--country-->
            <div class="mb-3">
                <label for="zipcode" class="fw-bold">zipcode</label>
                <input type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode"
                    id="zipcode" value="{{ old('zipcode', $apartment->zipcode) }}" minlength="1" maxlength="100" required>
                @error('zipcode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="fw-bold">Price per night</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="price" value="{{ old('price', $apartment->price) }}" min="1" max="99999" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <p class="text-dark pt-2 fw-bold">Select one or more services:</p>
                @foreach ($services as $service)
                    <div class="text-dark py-2">

                        <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input"
                            {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                        @if ($service->icon == 'instagram fa-rotate-180')
                            <i class="fa-brands fa-{{ $service->icon }} px-2"></i>
                        @else
                            <i class="fa-solid fa-{{ $service->icon }} px-2"></i>
                        @endif
                        <label for="services[]" class="form-check-label">{{ $service->name }}</label>

                    </div>
                @endforeach
                @error('services')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="visible">Visibility:</label>
                <input type="radio" id="visible" name="visible" value="1" checked>
                <label for="visible">Visible</label>

                <input type="radio" id="not-visible" name="visible" value="0">
                <label for="not-visible">Not Visible</label>
            </div>
            
            <div class="form-group">
                <p class="text-dark fw-bold pt-3">Select your sponsorship:</p>
                @foreach ($sponsorships as $sponsorship)
                    <div class="text-dark d-flex align-items-center gap-2 py-1">
                        <input type="checkbox" name="sponsorships[]" value="{{ $sponsorship->id }}"
                            class="form-check-input"
                            {{ in_array($sponsorship->id, old('sponsorships', [])) ? 'checked' : '' }}>
                        <label for="sponsorships[]" class="form-check-label">{{ $sponsorship->name }}</label>
                    </div>
                @endforeach
                @error('sponsorships')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
@endsection

