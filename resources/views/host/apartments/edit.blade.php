@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <a class="m-1" href="{{ route('host.apartments.show', $apartment->slug) }}"><button
                class="btn btn-primary text-white rounded-circle p-2 fs-4">
                <i class="fa-solid fa-arrow-left"></i></button></a>

        <h1 class="py-4">Edit your apartment: {{ $apartment->title }}</h1>


        <form action="{{ route('host.apartments.update', $apartment->slug) }}" onsubmit="validateForm(event)" id="editForm"
            method="POST" enctype="multipart/form-data" class="row">
            @csrf
            @method('PUT')
            <div class="col-6 border-pink mb-3">
                <label for="title" class="fw-bold">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    id="title" value="{{ old('title', $apartment->title) }}" minlength="3" maxlength="100" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-6 border-pink mb-3">
                <label for="description" class="fw-bold">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                    id="description" value="{{ old('description', $apartment->description) }}" minlength="10" required>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="border-pink">
                <label for="main_img" class="form-label fw-bold">Insert main image</label>
                <input class="form-control" type="file" id="main_img" name="main_img">
            </div>

            <div class="col-6 col-md-3 border-pink mb-3">
                <label for="rooms" class="fw-bold">Rooms</label>
                <input type="text" class="form-control @error('rooms') is-invalid @enderror" name="rooms"
                    id="rooms" value="{{ old('rooms', $apartment->rooms) }}" min="1" max="6" required>
                @error('rooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6 col-md-3 border-pink mb-3">
                <label for="beds" class="fw-bold">Beds</label>
                <input type="text" class="form-control @error('beds') is-invalid @enderror" name="beds" id="beds"
                    value="{{ old('beds', $apartment->beds) }}" min="1" max="10" required>
                @error('beds')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-6 col-md-3 border-pink mb-3">
                <label for="bathrooms" class="fw-bold">Bathrooms</label>
                <input type="text" class="form-control @error('bathrooms') is-invalid @enderror" name="bathrooms"
                    id="bathrooms" value="{{ old('bathrooms', $apartment->bathrooms) }}" min="1" max="3"
                    required>
                @error('bathrooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6 col-md-3 border-pink mb-3">
                <label for="square_meters" class="fw-bold">Square meters</label>
                <input type="text" class="form-control @error('square_meters') is-invalid @enderror" name="square_meters"
                    id="square_meters" value="{{ old('square_meters', $apartment->square_meters) }}" min="0"
                    max="500" required>
                @error('square_meters')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-9 border-pink mb-3">
                <label for="address" class="fw-bold">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                    id="address" value="{{ old('address', $apartment->address) }}" minlength="3" maxlength="255"
                    required>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-3 border-pink mb-3">
                <label for="zipcode" class="fw-bold">zipcode</label>
                <input type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode"
                    id="zipcode" value="{{ old('zipcode', $apartment->zipcode) }}" minlength="1" maxlength="100"
                    required>
                @error('zipcode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!--City-->
            <div class="col-6 border-pink mb-3">
                <label for="city" class="fw-bold">City</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                    id="city" value="{{ old('city', $apartment->city) }}" minlength="3" maxlength="100" required>
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!--country-->
            <div class="col-6 border-pink mb-3">
                <label for="country" class="fw-bold">Country</label>
                <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                    id="country" value="{{ old('country', $apartment->country) }}" minlength="1" maxlength="100"
                    required>
                @error('country')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!--country-->


            <div class="col-6 border-pink mb-3">
                <label for="price" class="fw-bold">Price per night</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                    id="price" value="{{ old('price', $apartment->price) }}" min="1" max="99999"
                    required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6 py-1">
                <label class="d-block fw-bold" for="visible">Visibility:</label>
                <input type="radio" id="visible" name="visible" value="1"
                    {{ old('visible', $apartment->visible) == 1 ? 'checked' : '' }}>
                <label for="visible">Visible</label>

                <input type="radio" id="not-visible" name="visible" value="0"
                    {{ old('visible', $apartment->visible) == 0 ? 'checked' : '' }}>
                <label for="not-visible">Not Visible</label>
            </div>


            <div class="form-group pt-3">
                <div class="row flex-row align-items-center justify-content-center">
                    <div class="col-12">
                        <p class="text-dark">Select one or more services:</p>
                    </div>
                    @foreach ($services as $service)
                        <div class="col-12 col-sm-6 col-md-4">

                            <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                class="form-check-input"
                                {{ in_array($service->id, old('services', $apartment->services->pluck('id')->toArray())) ? 'checked' : '' }}>
                            @if ($service->icon == 'instagram fa-rotate-180')
                                <i class="fa-brands fa-{{ $service->icon }} px-2"></i>
                            @else
                                <i class="fa-solid fa-{{ $service->icon }} px-2"></i>
                            @endif
                            <label for="services[]" class="form-check-label">{{ $service->name }}</label>
                        </div>
                    @endforeach
                    <div class="fs-3 text-danger" id="servicesError"></div>



                </div>
                @error('services')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>



            <div class="container pt-3">
                <!--btn save and reset-->
                <button type="submit" class="btn btn-dark">Save</button>
                <button type="reset" class="btn btn-primary text-white">Reset</button>

            </div>

        </form>
    </div>
@endsection

<script>
    function validateForm(event) {
        event.preventDefault(); // Prevents default form submission behavior

        var checkboxes = document.querySelectorAll('input[name="services[]"]');
        var isChecked = false;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                isChecked = true;
                break;
            }
        }
        var servicesError = document.getElementById('servicesError');
        if (!isChecked) {
            servicesError.textContent = 'Please select at least one service.';
            return false;
        } else {
            document.getElementById('editForm').submit();
        }

    }
</script>
