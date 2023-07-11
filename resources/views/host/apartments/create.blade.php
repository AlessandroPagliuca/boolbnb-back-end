@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <a class="m-1" href="{{ route('host.apartments.index') }}"><button
                class="btn btn-primary text-white rounded-circle fs-4">
                <i class="fa-solid fa-arrow-left"></i></button></a>
        <h2 class="my-4">Add you apartments</h2>
        <form class="fw-semibold" onsubmit="validateForm(event)" id="createForm" action="{{ route('host.apartments.store') }}"
            method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row align-items-center justify-content-center">
                <!--Title-->
                <div class="col-6 border-pink pb-3">
                    <label for="title">Title *</label>
                    <input type="text" minlength="3" maxlength="100"
                        class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                        value="{{ old('title') }}" required>

                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!--Description-->
                <div class="col-6 border-pink pb-3">
                    <label for="description">Description *</label>
                    <input type="text" minlength="10" class="form-control @error('description') is-invalid @enderror"
                        name="description" id="description" value="{{ old('description') }}" required>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <div class="row align-items-center justify-content-center">
                <!-- MAIN Image-->
                <div class="col-12 border-pink pb-3">
                    <label for="main_img" class="form-label">Insert main image *</label>
                    <input class="form-control" type="file" id="main_img" name="main_img" required>
                </div>
            </div>
            <div class="row align-items-center justify-content-start">
                <!--Rooms-->
                <div class="col-6 col-md-3 border-pink pb-3">
                    <label for="rooms">Rooms *</label>
                    <input type="number" class="form-control text-center @error('rooms') is-invalid @enderror"
                        name="rooms" id="rooms" value="{{ old('rooms') }}" min="1" max="6" required>

                    @error('rooms')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!--Beds-->
                <div class="col-6 col-md-3 border-pink pb-3">
                    <label for="beds">Beds *</label>
                    <input type="number" class="form-control text-center @error('beds') is-invalid @enderror"
                        name="beds" id="beds" value="{{ old('beds') }}" min="1" max="10" required>

                    @error('beds')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!--Bathrooms-->
                <div class="col-6 col-md-3 border-pink pb-3">
                    <label for="bathrooms">Bathrooms *</label>
                    <input type="number" class="form-control text-center @error('bathrooms') is-invalid @enderror"
                        name="bathrooms" id="bathrooms" value="{{ old('bathrooms') }}" min="1" max="3"
                        required>

                    @error('bathrooms')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!--Square meters-->
                <div class="col-6 col-md-3 border-pink pb-3">
                    <label for="square_meters">Square meters *</label>
                    <input type="number" class="form-control text-center @error('square_meters') is-invalid @enderror"
                        name="square_meters" id="square_meters" value="{{ old('square_meters') }}" min="0"
                        max="500" required>

                    @error('square_meters')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


            <div class="row align-items-center justify-content-center">
                <!--ADDRESS-->
                <div class="col-6 col-md-10 border-pink pb-3">
                    <label for="address">Address *</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        id="address" value="{{ old('address') }}" minlength="3" maxlength="255" required>

                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!--ZIPCODE-->
                <div class="col-6 col-md-2 border-pink pb-3">
                    <label for="zipcode">Zipcode *</label>
                    <input type="text" class="form-control text-center @error('zipcode') is-invalid @enderror"
                        name="zipcode" id="zipcode" value="{{ old('zipcode') }}" minlength="1" maxlength="100"
                        required>

                    @error('zipcode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <!--CITY-->
                <div class="col-6 border-pink pb-3">
                    <label for="city">City *</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                        id="city" value="{{ old('city') }}" minlength="3" maxlength="100" required>
                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!--Country-->
                <div class="col-6 border-pink pb-3">
                    <label for="country">Country *</label>
                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country"
                        id="country" value="{{ old('country') }}" minlength="1" maxlength="100" required>
                    @error('country')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <!--Price per night and Visibility-->
            <div class="row align-items-center justify-content-center">
                <!--Price per night-->
                <div class="col-6 border-pink pb-3">
                    <label for="price">Price per night *</label>
                    <input type="number" class="form-control text-center @error('price') is-invalid @enderror"
                        name="price" id="price" value="{{ old('price') }}" min="1" max="99999"
                        required>

                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!--Visibility-->
                <div class="col-6 pb-3">
                    <label for="visible" class="py-1">Visibility :</label><br>
                    <input type="radio" id="visible" name="visible" value="1" checked>
                    <label for="visible" class="pe-2">Visible</label>

                    <input type="radio" id="not-visible" name="visible" value="0">
                    <label for="not-visible">Not Visible</label>
                </div>
            </div>
            <!--services-->
            <div class="form-group pt-3">
                <div class="row flex-row align-items-center justify-content-center">
                    <div class="col-12 pb-3">
                        <p class="text-dark">Select one or more services:</p>
                    </div>

                    @foreach ($services as $service)
                        <div class="col-12 col-sm-6 col-md-4 pb-3">

                            <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                class="form-check-input py-1"
                                {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                            <label for="services[]" class="form-check-label py-1">{{ $service->name }}</label>
                            @if ($service->icon == 'instagram fa-rotate-180')
                                <i class="fa-brands fa-{{ $service->icon }} px-2"></i>
                            @else
                                <i class="fa-solid fa-{{ $service->icon }} px-2"></i>
                            @endif
                        </div>
                    @endforeach
                    <div class="fs-3 text-danger" id="servicesError"></div>
                    @error('services')
                        <div id="servicesError" class="invalid-feedback">{{ $message }}</div>
                    @enderror


                </div>
            </div>
    </div>
    <div class="container pb-3">
        <!--btn save and reset-->
        <button type="submit" class="btn btn-dark">Save</button>
        <button type="reset" class="btn btn-primary text-white">Reset</button>

    </div>
    </form>

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
                document.getElementById('createForm').submit();
            }

        }
    </script>
@endsection
