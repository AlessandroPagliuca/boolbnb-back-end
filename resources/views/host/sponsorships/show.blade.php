@extends('layouts.login-register-template')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="d-flex flex-column justify-content-center align-items-end">
            <form action="{{ route('host.sponsorships.add', ['slug' => $apartment->slug]) }}" method="POST">
                @csrf
                <div id="dropin-container"></div>
                <input type="hidden" name="slug" value="{{ $apartment->slug }}">
                <button class="btn btn-success text-uppercase fw-semibold">sponsor for
                    {{ $sponsorship->price }}&euro;</button>
            </form>

        </div>
    </div>
    <script>
        let button = document.querySelector('#submit-button');

        braintree.dropin.create({
            authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
            selector: '#dropin-container'
        }, function(err, instance) {
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    // Submit payload.nonce to your server
                    document.querySelector('form').submit();
                });
            })
        });
    </script>
@endsection

<style>
    .button {
        cursor: pointer;
        font-weight: 500;
        left: 3px;
        line-height: inherit;
        position: relative;
        text-decoration: none;
        text-align: center;
        border-style: solid;
        border-width: 1px;
        border-radius: 3px;
        -webkit-appearance: none;
        -moz-appearance: none;
        display: inline-block;
    }

    .button--small {
        padding: 10px 20px;
        font-size: 0.875rem;
    }

    .button--green {
        outline: none;
        background-color: #64d18a;
        border-color: #64d18a;
        color: white;
        transition: all 200ms ease;
    }

    .button--green:hover {
        background-color: #8bdda8;
        color: white;
    }
</style>
