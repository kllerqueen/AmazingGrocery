@extends('template.template')

@section('head')

@endsection

@section('body')
    @section('authButton')
        <div class="d-flex gap-5 px-2 bg-warning">
            <a href="/login" class="text-decoration-none">
                <p class="text-black">Log In</p>
            </a>
    
            <a href="/register/en" class="text-decoration-none">
                <p class="text-black">Register</p>
            </a>
        </div>

    @endsection

    @section('content')
        <div class="d-flex m-auto">
            <h1>Find and buy your grocery here!</h1>
        </div>
    @endsection

@endsection