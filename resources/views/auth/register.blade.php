@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center fw-bold">{{ __('REGISTER') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!--NAME AND SURNAME-->
                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">

                                 <div class="">
                                    <input id="name" type="text" class="form-control rounded-5" name="name"
                                        value="{{ old('name') }}" placeholder="NAME" autocomplete="name" autofocus>

                                </div>


                                <div class="">
                                    <input id="surname" type="text" class="form-control rounded-5" name="surname"
                                        value="{{ old('surname') }}" placeholder="SURNAME" autocomplete="surname" autofocus>

                                </div>
                            </div>

                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control rounded-5 @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="EMAIL" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!--PASSWORD-->
                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">

                                <div class="">
                                    <input id="password" type="password"
                                        class="form-control rounded-5 @error('password') is-invalid @enderror" name="password"
                                        placeholder="PASSWORD" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control rounded-5"
                                        name="password_confirmation" placeholder="CONFIRM PASSWORD" required autocomplete="new-password">
                                </div>
                            </div>

                            <!--DATE_OF_BIRTH-->
                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">
                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date" class="form-control rounded-5" name="date_of_birth"
                                        value="{{ old('date_of_birth') }}" placeholder="DATE_OF_BIRTH" autocomplete="date_of_birth" autofocus>
                                        <p class=" smal text-secondary">date of birth</p>
                                </div>

                            </div>

                            <div class="mb-4 d-flex align-items-center justify-content-center gap-4">

                                <div class=" text-decoration-underline">
                                    <a class="nav-link" href="{{ route('login') }}">Sei già registrato</a>
                                </div>

                                <div class="col-md-6 offset-md-4 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
