@extends('template.template')

@section('head')
    
@endsection

@section('authButton')
    
@endsection

@section('body')
    @section('content')
        <div class="d-flex flex-column min-vh-100">
            <div class="d-flex flex-row justify-content-center px-5">
                <div class="d-flex w-25 align-items-center">
                    <img src="{{ asset('storage/' . $user->display_picture_link) }}" class="d-flex w-100" alt="/">
                </div>

                <form action="{{ route('updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center py-5 w-100">
                    @csrf
                    @method('PUT')

                    <div class="d-flex flex-row gap-5 w-75">
                        <div class="d-flex flex-column gap-2 w-100 my-5">
                            <label for="first_name">First Name: </label>
                            <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}">
                            @error('first_name')
                                <div class="alert-danger text-danger">First name cannot be empty or more than 25 characters</div>
                            @enderror
        
                            <label for="email">Email: </label>
                            <input type="text" name="email" id="email" value="{{ $user->email }}">
                            @error('email')
                                <div class="alert-danger text-danger">Email cannot be empty and must be valid</div>
                            @enderror
        
                            <label for="">Gender</label>
                            <div class="mb-4">
                                <input type="radio" {{$user->gender_id == 1 ? 'checked' : ''}}  name="gender" id="male" value="Male">
                                <label for="male">Male</label>
        
                                <input type="radio" {{$user->gender_id == 2 ? 'checked' : ''}} name="gender" id="female" value="Female">
                                <label for="female">Female</label>
                            </div>
                            @error('gender')
                                <div class="alert-danger text-danger">Gender must be selected</div>
                            @enderror
        
                            <label for="password">New Password: </label>
                            <input type="password" name="password" id="password">
                            @error('password')
                                <div class="alert-danger text-danger">Password must be alphanumeric and cannot be less than 8 characters</div>
                            @enderror
                        </div>
        
                        <div class="d-flex flex-column gap-2 w-100 my-5">
                            <label for="last_name">Last Name: </label>
                            <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}">
                            @error('last_name')
                                <div class="alert-danger text-danger">Last name cannot be empty or more than 25 characters</div>
                            @enderror
        
                            <label for="role">Role: </label>
                            <p class="d-flex justify-content-center bg-secondary-subtle py-2 fw-semibold">{{ $user->role_id == 1 ? 'User' : 'Admin' }}</p>
                            @error('role')
                                <div class="alert-danger text-danger">Role must be selected</div>
                            @enderror
        
                            <label for="display_picture">Display Picture: </label>
                            <input type="file" name="display_picture" id="display_picture">
                            @error('display_picture')
                                <div class="alert-danger text-danger">Display picture cannot be empty and must be an image</div>
                            @enderror
        
                            <label for="confirm_pass">Confirm Password: </label>
                            <input type="password" name="confirm_pass" id="confirm_pass">
                            @error('confirm_pass')
                                <div class="alert-danger text-danger">Password does not match</div>
                            @enderror
                        </div>
                    </div>
        
                    <button>Submit</button>
                </form>
            </div>
        </div>
    @endsection
@endsection