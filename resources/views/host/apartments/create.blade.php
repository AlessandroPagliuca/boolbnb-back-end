@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Aggiungi un nuovo appartamento</h1>
    <form action="{{ route('host.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invali

            @enderror" name="title" id="title" >

            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="description">Descrizione</label>
            <input type="text" class="form-control @error('description') is-invali

            @enderror" name="description" id="description" >

            @error('description')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="rooms">Camere</label>
            <input type="number" class="form-control @error('rooms') is-invali

            @enderror" name="rooms" id="rooms" >

            @error('rooms')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="beds">Posti letto</label>
            <input type="number" class="form-control @error('beds') is-invali

            @enderror" name="beds" id="beds" >

            @error('beds')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="bathrooms">Bagni</label>
            <input type="number" class="form-control @error('bathrooms') is-invali

            @enderror" name="bathrooms" id="bathrooms" >

            @error('bathrooms')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="square_meters">Metri quadrati</label>
            <input type="number" class="form-control @error('square_meters') is-invali

            @enderror" name="square_meters" id="square_meters" >

            @error('square_meters')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invali

            @enderror" name="address" id="address" >

            @error('address')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="latitude">Latitudine</label>
            <input type="text" class="form-control @error('latitude') is-invali

            @enderror" name="latitude" id="latitude" >

            @error('latitude')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>
        <div class="mb-3">
            <label for="longitude">Longitudine</label>
            <input type="text" class="form-control @error('longitude') is-invali

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
            <input type="checkbox" class="form-control @error('visible') is-invali

            @enderror" name="visible" id="visible" >

            @error('visible')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div> --}}
        <div class="mb-3">
            <label for="price">Prezzo per notte</label>
            <input type="text" class="form-control @error('price') is-invali

            @enderror" name="price" id="price" >

            @error('price')
            <div class="invalid-feedback">
                 {{$message}}
            </div>

            @enderror
        </div>


        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
</div>
@endsection
