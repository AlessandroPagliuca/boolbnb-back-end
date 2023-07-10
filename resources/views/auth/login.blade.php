@extends('layouts.login-register-template')

@section('content')
    <div class="container d-flex align-items-center justify-content-center bg-bg vh-100">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card box-card">
                    <div class="pt-4 pb-2 text-center fs-4 fw-bold">{{ __('Login') }}</div>
                    <!--Info message-->
                    <div class="mb-4 d-flex align-items-center justify-content-center gap-4">
                        <div class="col-12 text-center fw-semibold">
                            <span>Please enter your email and password!</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">
                                <div class="col-12 border-pink">
                                    <input id="email" type="email"
                                        class="form-control p-3 rounded-5 @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="Email *" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">
                                <div class="col-12 border-pink">
                                    <input id="password" type="password"
                                        class="form-control p-3 rounded-5 @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password *" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">
                                <div class="col-md-6 border-pink text-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <!--Submit for register-->
                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">
                                <button type="submit" class="btn btn-primary px-5 py-3 text-white rounded-5 fw-semibold">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <!--If don't have account, direction on register page-->
                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">
                                <div class="col-12 text-center fw-semibold">
                                    <span class="pe-2">Don't have an account?</span>
                                    <a class="nav-link d-inline" href="{{ route('register') }}">Register</a>
                                </div>
                            </div>
                            <!--Logo-->
                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">
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
