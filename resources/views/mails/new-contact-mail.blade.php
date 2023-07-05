@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-start p-3">
        <h1>Hi host!</h1>
        <p>
            You have received a new message, here are the details:<br>
            Name: {{ $message->name }}<br>
            Email: {{ $message->email }}<br>
            Message:<br>
            {{ $message->message }}
        </p>
    </div>
@endsection
