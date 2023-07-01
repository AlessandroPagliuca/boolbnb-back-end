@extends('layouts.app')

@section('content')
<div class="container">


    <h1>Edit your apartment: {{ $apartment->title }}</h1>
    <a class="m-1" href="{{ route('host.apartments.show', $apartment->slug) }}"><button
        class="btn btn-warning"> Show</button></a>

    <form action="{{ route('host.apartments.update', $apartment->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                value="{{ old('title', $apartment->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="main_img">Image</label>
            <input type="text"{{-- cambiare text in file  --}} class="form-control @error('main_img') is-invalid @enderror" name="main_img" id="main_img"
                value="{{ old('main_img', $apartment->main_img) }}">
            @error('main_img')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                id="description" value="{{ old('description', $apartment->description) }}">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <label for="visible">Visibilità</label>
            <input type="text" class="form-control @error('visible') is-invalid @enderror" name="visible"
                id="visible" value="{{ old('visible', $apartment->visible) }}">
            @error('visible')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}
        <div class="mb-3">
            <label for="rooms">Rooms</label>
            <input type="text" class="form-control @error('rooms') is-invalid @enderror" name="rooms"
                id="rooms" value="{{ old('rooms', $apartment->rooms) }}">
            @error('rooms')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="beds">Beds</label>
            <input type="text" class="form-control @error('beds') is-invalid @enderror" name="beds"
                id="beds" value="{{ old('beds', $apartment->beds) }}">
            @error('beds')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bathrooms">Bathrooms</label>
            <input type="text" class="form-control @error('bathrooms') is-invalid @enderror" name="bathrooms" id="bathrooms"
                value="{{ old('bathrooms', $apartment->bathrooms) }}">
            @error('bathrooms')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="square_meters">Square meters (m²)</label>
            <input type="text" class="form-control @error('square_meters') is-invalid @enderror" name="square_meters"
                id="square_meters" value="{{ old('square_meters', $apartment->square_meters) }}">
            @error('square_meters')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                id="address" value="{{ old('address', $apartment->address) }}">
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude"
                id="latitude" value="{{ old('latitude', $apartment->latitude) }}">
            @error('latitude')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div><div class="mb-3">
            <label for="longitude">Longitude</label>
            <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude"
                id="longitude" value="{{ old('longitude', $apartment->longitude) }}">
            @error('longitude')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price">Price per night</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                id="price" value="{{ old('price', $apartment->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <p class="text-dark">Select one or more services:</p>
            @foreach ($services as $service)
                <div class="text-dark">
                    <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input"
                        {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                    <label for="services[]" class="form-check-label">{{ $service->name }}</label>
                    <i class="fa-solid fa-{{$service->icon}}"></i>
                </div>
            @endforeach
            @error('services')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <p class="text-dark">Select your sponsorship:</p>
            @foreach ($sponsorships as $sponsorship)
                <div class="text-dark">
                    <input type="checkbox" name="sponsorships[]" value="{{ $sponsorship->id }}" class="form-check-input"
                        {{ in_array($sponsorship->id, old('sponsorships', [])) ? 'checked' : '' }}>
                    <label for="sponsorships[]" class="form-check-label">{{ $sponsorship->name }} {{ $sponsorship->price }} {{ $sponsorship->duration }} {{ $sponsorship->description }}</label>
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
