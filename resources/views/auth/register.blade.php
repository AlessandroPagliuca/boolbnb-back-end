@extends('layouts.login-register-template')

@section('content')
    <div class="d-flex align-items-center justify-content-center min-vh-100 bg-bg">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card box-card">
                    <div class="p-4 text-center fs-4 fw-bold">{{ __('REGISTER') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!--NAME AND SURNAME-->
                            <div class="row align-items-center justify-content-center">
                                <!--NAME-->
                                <div class="col-6 border-pink">
                                    <input id="name" type="text" class="form-control p-3 mb-4 rounded-5"
                                        name="name" value="{{ old('name') }}" placeholder="Name" autocomplete="name"
                                        autofocus>

                                </div>
                                <!--SURNAME-->
                                <div class="col-6 border-pink">
                                    <input id="surname" type="text" class="form-control p-3 mb-4 rounded-5"
                                        name="surname" value="{{ old('surname') }}" placeholder="Surname"
                                        autocomplete="surname" autofocus>

                                </div>
                            </div>
                            <!--EMAIL-->
                            <div class="row d-flex align-items-center justify-content-center gap-4">

                                <div class="col-12 border-pink">
                                    <input id="email" type="email"
                                        class="form-control py-3 px-2 mb-4 rounded-5 @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="Email *" required
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--PASSWORD-->
                            <div class="row d-flex align-items-center justify-content-center">

                                <div class="col-6 border-pink">
                                    <input id="password" type="password"
                                        class="form-control p-3 rounded-5 mb-4 @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password *" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-6 border-pink">
                                    <input id="password-confirm" type="password" class="form-control p-3 mb-4 rounded-5"
                                        name="password_confirmation" placeholder="Confirm password*" required
                                        autocomplete="new-password">

                                </div>
                            </div>
                            <div class="row d-flex align-items-center justify-content-center gap-4">
                                <!--DATE_OF_BIRTH-->
                                <div class="col-12 border-pink">
                                    <label for="date_of birth">Date of birth</label>
                                    <input id="date_of_birth" type="date" class="form-control px-4 py-3 mb-4 rounded-5"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Date of birth"
                                        autocomplete="date_of_birth" autofocus>
                                </div>
                            </div>
                            <!--Submit for register-->
                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">
                                <button type="submit" class="btn btn-primary px-5 py-3 text-white rounded-5 fw-semibold"
                                    onclick="checkPasswordMatch()">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <!--If have account, direction on login page-->
                            <div class="row d-flex align-items-center justify-content-center gap-4">
                                <div class="col-12 text-center fw-semibold">
                                    <div class="mb-4">
                                        <span class="pe-2">Do you have an account?</span>
                                        <a class="nav-link d-inline" href="{{ route('login') }}">Login</a>
                                    </div>

                                </div>
                            </div>
                            <!--Logo-->
                            <div class="row d-flex align-items-center justify-content-center gap-4">
                                <div class="col-12 text-center fw-semibold">
                                    <span class="text-uppercase primary-color">boolbnb</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function checkPasswordMatch() {
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password-confirm');
        const passwordMatchError = document.getElementById('password-match-error');

        if (confirmPasswordInput.value !== passwordInput.value) {
            confirmPasswordInput.setCustomValidity('Passwords do not match');
            passwordMatchError.style.display = 'block';
        } else {
            confirmPasswordInput.setCustomValidity('');
            passwordMatchError.style.display = 'none';
        }
    }
</script>
