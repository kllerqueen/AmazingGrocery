@extends('template.template')

@section('head')
    
@endsection

@section('body')
    @section('content')
        
    <div class="px-5">
        <h1>Login</h1>
    </div>

    <div class="d-flex justify-content-center">
        <form action="{{ route('loginAccount') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center p-5 w-25">
            @csrf
        
            <div class="d-flex flex-column gap-2 w-100 my-5">
                <label for="email">Email Address: </label>
                <input type="text" name="email" id="email">
                @error('email')
                        <div class="alert-danger text-danger">Wrong email please try again</div>
                @enderror
                
                <label for="password" >Password: </label>
                <input type="password" name="password" id="password">
                @error('password')
                        <div class="alert-danger text-danger">Wrong password please try again</div>
                    @enderror
            </div>
    
            <button type="submit">Submit</button>
        </form>
    </div>

    
    <a href="/register" class="d-flex justify-content-center">Don't have an account? Click here to sign up</a>

    @endsection
@endsection