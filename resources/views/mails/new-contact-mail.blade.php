@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-start p-3">
        <h2>Hi host!</h2>
        <p>
            You have received a new message, here are the details:<br>
            Email: {{ $message->email }}<br>
            Message:<br>
            {{ $message->message }}
        </p>
    </div>
@endsection
