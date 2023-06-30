@extends('layouts.app')

@section('content')
<div class="container">


    <h1>Modifica il tuo Appartamento: {{ $apartment->title }}</h1>
    <a class="m-1" href="{{ route('host.apartments.show', $apartment->slug) }}"><button
        class="btn btn-warning"> Show</button></a>

    <form action="{{ route('host.apartments.update', $apartment->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title">Nome</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                value="{{ old('title', $apartment->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="main_img">immagine</label>
            <input type="text" class="form-control @error('main_img') is-invalid @enderror" name="main_img" id="main_img"
                value="{{ old('main_img', $apartment->main_img) }}">
            @error('main_img')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Descrizione appartamento</label>
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
            <label for="rooms">Camere</label>
            <input type="text" class="form-control @error('rooms') is-invalid @enderror" name="rooms"
                id="rooms" value="{{ old('rooms', $apartment->rooms) }}">
            @error('rooms')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="beds">Posti letto</label>
            <input type="text" class="form-control @error('beds') is-invalid @enderror" name="beds"
                id="beds" value="{{ old('beds', $apartment->beds) }}">
            @error('beds')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bathrooms">Bagni</label>
            <input type="text" class="form-control @error('bathrooms') is-invalid @enderror" name="bathrooms" id="bathrooms"
                value="{{ old('bathrooms', $apartment->bathrooms) }}">
            @error('bathrooms')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="square_meters">Metri Quadrati (m²)</label>
            <input type="text" class="form-control @error('square_meters') is-invalid @enderror" name="square_meters"
                id="square_meters" value="{{ old('square_meters', $apartment->square_meters) }}">
            @error('square_meters')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                id="address" value="{{ old('address', $apartment->address) }}">
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="latitude">Latitudine</label>
            <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude"
                id="latitude" value="{{ old('latitude', $apartment->latitude) }}">
            @error('latitude')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div><div class="mb-3">
            <label for="longitude">Longitudine</label>
            <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude"
                id="longitude" value="{{ old('longitude', $apartment->longitude) }}">
            @error('longitude')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price">Prezzo per notte</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                id="price" value="{{ old('price', $apartment->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        {{-- <div class="mb3">
            <label for="type_id">Seleziona Type</label>
            <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                <option value="">Select tech</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"
                        {{ $type->id == old('type_id', $apartment->type_id) ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            @error('type_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <p>Select one or more weapon:</p>
            @foreach ($weapons as $weapon)
                <div class="text-light">
                    @if ($errors->any())
                        <input type="checkbox" name="weapons[]" value="{{ $weapon->id }}" class="form-check-input"
                            {{ in_array($weapon->id, old('weapons', [])) ? 'checked' : '' }}>
                    @else
                        <input type="checkbox" name="weapons[]" value="{{ $weapon->id }}" class="form-check-input"
                            {{ $apartment->weapons->contains($weapon) ? 'checked' : '' }}>
                    @endif
                    <label for="" class="form-check-label">{{ $weapon->name }}</label>
                </div>
            @endforeach
            @error('weapons')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
</div>
@endsection
