@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <a class="m-1" href="{{ route('host.apartments.show', $apartment->slug) }}"><button
                class="btn btn-primary text-white rounded-circle p-2 fs-4">
                <i class="fa-solid fa-arrow-left"></i></button></a>

        <h1 class="py-4">Edit your apartment: {{ $apartment->title }}</h1>


        <form action="{{ route('host.apartments.update', $apartment->slug) }}" method="POST" enctype="multipart/form-data"
            class="row">
            @csrf
            @method('PUT')
            <div class="row align-items-center justify-content-center">
                <!--Title-->
                <div class="col-6 border-pink pb-3">
                    <label for="title" class="fw-bold">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        id="title" value="{{ old('title', $apartment->title) }}" minlength="3" maxlength="100"
                        required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--Description-->
                <div class="col-6 border-pink pb-3">
                    <label for="description" class="fw-bold">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                        id="description" value="{{ old('description', $apartment->description) }}" minlength="10" required>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- MAIN Image-->
            <div class="row align-items-center justify-content-center">
                <div class="col-12 border-pink pb-3">
                    <label for="main_img" class="form-label fw-bold">Insert main image</label>
                    <input class="form-control" type="file" id="main_img" name="main_img">
                </div>
            </div>

            <div class="row align-items-center justify-content-center">
                <!--Rooms-->
                <div class="col-6 col-md-3 border-pink pb-3">
                    <label for="rooms" class="fw-bold">Rooms</label>
                    <input type="text" class="form-control @error('rooms') is-invalid @enderror" name="rooms"
                        id="rooms" value="{{ old('rooms', $apartment->rooms) }}" min="1" max="6" required>
                    @error('rooms')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--Beds-->
                <div class="col-6 col-md-3 border-pink pb-3">
                    <label for="beds" class="fw-bold">Beds</label>
                    <input type="text" class="form-control @error('beds') is-invalid @enderror" name="beds"
                        id="beds" value="{{ old('beds', $apartment->beds) }}" min="1" max="10" required>
                    @error('beds')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--Bathrooms-->
                <div class="col-6 col-md-3 border-pink pb-3">
                    <label for="bathrooms" class="fw-bold">Bathrooms</label>
                    <input type="text" class="form-control @error('bathrooms') is-invalid @enderror" name="bathrooms"
                        id="bathrooms" value="{{ old('bathrooms', $apartment->bathrooms) }}" min="1" max="3"
                        required>
                    @error('bathrooms')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--Square meters-->
                <div class="col-6 col-md-3 border-pink pb-3">
                    <label for="square_meters" class="fw-bold">Square meters</label>
                    <input type="text" class="form-control @error('square_meters') is-invalid @enderror"
                        name="square_meters" id="square_meters"
                        value="{{ old('square_meters', $apartment->square_meters) }}" min="0" max="500"
                        required>
                    @error('square_meters')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <!--ADDRESS-->
                <div class="col-6 col-md-10 border-pink pb-3">
                    <label for="address" class="fw-bold">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        id="address" value="{{ old('address', $apartment->address) }}" minlength="3" maxlength="255"
                        required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--ZIPCODE-->
                <div class="col-6 col-md-2 border-pink pb-3">
                    <label for="zipcode" class="fw-bold">Zipcode</label>
                    <input type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode"
                        id="zipcode" value="{{ old('zipcode', $apartment->zipcode) }}" minlength="1" maxlength="100"
                        required>
                    @error('zipcode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row align-items-center justify-content-center">
                <!--CITY-->
                <div class="col-6 border-pink pb-3">
                    <label for="city" class="fw-bold">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                        id="city" value="{{ old('city', $apartment->city) }}" minlength="3" maxlength="100"
                        required>
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--Country-->
                <div class="col-6 border-pink pb-3">
                    <label for="country" class="fw-bold">Country</label>
                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                        id="country" value="{{ old('country', $apartment->country) }}" minlength="1" maxlength="100"
                        required>
                    @error('country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row align-items-center justify-content-center">

                <!--Price per night and Visibility-->
                <div class="col-6 border-pink pb-3">
                    <!--Price per night-->
                    <label for="price" class="fw-bold">Price per night</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                        id="price" value="{{ old('price', $apartment->price) }}" min="1" max="99999"
                        required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!--Visibility-->
                <div class="col-6 pb-3">
                    <label class="d-block fw-bold" for="visible">Visibility:</label>
                    <input type="radio" id="visible" name="visible" value="1" checked>
                    <label for="visible">Visible</label>

                    <input type="radio" id="not-visible" name="visible" value="0">
                    <label for="not-visible">Not Visible</label>
                </div>
            </div>
            <!--services-->
            <div class="form-group">
                <div class="row flex-row align-items-center justify-content-center">
                    <div class="col-12 pb-3">
                        <p class="text-dark">Select one or more services:</p>
                    </div>
                    @foreach ($services as $service)
                        <div class="col-12 col-sm-6 col-md-4 pb-3">

                            <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                class="form-check-input"
                                {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                            @if ($service->icon == 'instagram fa-rotate-180')
                                <i class="fa-brands fa-{{ $service->icon }} px-2"></i>
                            @else
                                <i class="fa-solid fa-{{ $service->icon }} px-2"></i>
                            @endif
                            <label for="services[]" class="form-check-label">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('services')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="container pb-3">
                <!--btn save and reset-->
                <button type="submit" class="btn btn-dark">Save</button>
                <button type="reset" class="btn btn-primary text-white">Reset</button>

            </div>
        </form>
    </div>
@endsection

<script>
    // Client-side form validation
    document.getElementById("apartmentForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission

        // Clear previous error messages
        clearErrorMessages();

        // Perform validation for each field
        var title = document.getElementById("title").value;
        if (title.length < 3 || title.length > 100) {
            displayErrorMessage("title", "Title must be between 3 and 100 characters.");
        }

        var description = document.getElementById("description").value;
        if (description.length < 10) {
            displayErrorMessage("description", "Description must be at least 10 characters.");
        }

        var rooms = document.getElementById("rooms").value;
        if (rooms < 1 || rooms > 6) {
            displayErrorMessage("rooms", "Number of rooms must be between 1 and 6.");
        }

        var beds = document.getElementById("beds").value;
        if (beds < 1 || beds > 10) {
            displayErrorMessage("beds", "Number of beds must be between 1 and 10.");
        }

        var bathrooms = document.getElementById("bathrooms").value;
        if (bathrooms < 1 || bathrooms > 3) {
            displayErrorMessage("bathrooms", "Number of bathrooms must be between 1 and 3.");
        }

        var squareMeters = document.getElementById("square_meters").value;
        if (squareMeters < 0 || squareMeters > 500) {
            displayErrorMessage("square_meters", "Square meters must be between 0 and 500.");
        }

        // If there are no errors, submit the form
        if (document.getElementsByClassName("error").length === 0) {
            document.getElementById("apartmentForm").submit();
        }
    });

    // Function to display an error message for a field
    function displayErrorMessage(fieldId, message) {
        var errorDiv = document.getElementById(fieldId + "Error");
        errorDiv.innerText = message;
    }

    // Function to clear all error messages
    function clearErrorMessages() {
        var errorDivs = document.getElementsByClassName("error");
        for (var i = 0; i < errorDivs.length; i++) {
            errorDivs[i].innerText = "";
        }
    }
</script>
