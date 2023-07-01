@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Aggiungi un nuovo appartamento</h1>
    <form action="{{ route('host.apartments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid

            @enderror" name="title" id="title" >

            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>

            @enderror
        </div>

        <div class="mb-3">
            <label for="main_img">Immagine</label>
            <input type="text"  class="form-control @error('main_img') is-invalid
            {{-- cambiare text in file  --}}
             @enderror" name="main_img" id="main_img" >

            @error('main_img')
            <div class="invalid-feedback">
                {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control @error('description') is-invalid

            @enderror" name="description" id="description" >

            @error('description')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="rooms">Camere</label>
            <input type="number" class="form-control @error('rooms') is-invalid

            @enderror" name="rooms" id="rooms" >

            @error('rooms')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="beds">Posti letto</label>
            <input type="number" class="form-control @error('beds') is-invalid

            @enderror" name="beds" id="beds" >

            @error('beds')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="bathrooms">Bagni</label>
            <input type="number" class="form-control @error('bathrooms') is-invalid

            @enderror" name="bathrooms" id="bathrooms" >

            @error('bathrooms')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="square_meters">Metri quadrati</label>
            <input type="number" class="form-control @error('square_meters') is-invalid

            @enderror" name="square_meters" id="square_meters" >

            @error('square_meters')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid

            @enderror" name="address" id="address" >

            @error('address')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="latitude">Latitudine</label>
            <input type="text" class="form-control @error('latitude') is-invalid

            @enderror" name="latitude" id="latitude" >

            @error('latitude')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="longitude">Longitudine</label>
            <input type="text" class="form-control @error('longitude') is-invalid

            @enderror" name="longitude" id="longitude" >

            @error('longitude')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        {{-- <div class="mb-3">
            <label for="visible">Visibile</label>
            {{-- <input type="checkbox" class="form-control" name="visible" id="visible" >
            <input type="checkbox" class="form-control @error('visible') is-invalid

            @enderror" name="visible" id="visible" >

            @error('visible')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div> --}}
        <div class="mb-3">
            <label for="price">Prezzo per notte</label>
            <input type="number" class="form-control @error('price') is-invalid
            @enderror" name="price" id="price" >

            @error('price')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="form-group">
            <p class="text-dark">Select one or more services:</p>
            @foreach ($services as $service)
                <div class="text-dark">
                    <input type="checkbox" name="services[]" value="{{ $service->id }}" class="form-check-input"
                        {{ in_array($service->id, old('tags', [])) ? 'checked' : '' }}>
                    <label for="services[]" class="form-check-label">{{ $service->icon }} {{ $service->name }}</label>
                </div>
            @endforeach
            @error('services')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <p class="text-dark">Select one or more services:</p>
            @foreach ($sponsorships as $sponsorship)
                <div class="text-dark">
                    <input type="checkbox" name="sponsorships[]" value="{{ $sponsorship->id }}" class="form-check-input"
                        {{ in_array($service->id, old('sponsorships', [])) ? 'checked' : '' }}>
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


