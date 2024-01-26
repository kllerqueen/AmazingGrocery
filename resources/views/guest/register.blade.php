@extends('template.template')

@section('title')
   {{ __('form.title') }}
@endsection

@section('head')
@endsection

@section('body')
    @section('content')
        
        <div class="px-5">
            <h1>{{ __('form.judul') }}</h1>
        </div>

        <form action="{{ route('registerAccount') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center p-5 w-100">
            @csrf
            <div class="d-flex flex-row gap-5 w-75">
                <div class="d-flex flex-column gap-2 w-100 my-5">
                    <label for="first_name">{{ __('form.input.nama_depan') }}: </label>
                    <input type="text" name="first_name" id="first_name">
                    @error('first_name')
                        <div class="alert-danger text-danger">First name cannot be empty or more than 25 characters</div>
                    @enderror

                    <label for="email">{{ __('form.input.surel') }}: </label>
                    <input type="text" name="email" id="email">
                    @error('email')
                        <div class="alert-danger text-danger">Email cannot be empty and must be valid</div>
                    @enderror

                    <label for="">{{ __('form.input.jenis_kelamin') }}</label>
                    <div>
                        <input type="radio" checked="checked" name="gender" id="male" value="Male">
                        <label for="male">{{ __('form.input.pilihan_jenis_kelamin.laki_laki') }}</label>

                        <input type="radio" name="gender" id="female" value="Female">
                        <label for="female">{{ __('form.input.pilihan_jenis_kelamin.perempuan') }}</label>
                    </div>
                    @error('gender')
                        <div class="alert-danger text-danger">Gender must be selected</div>
                    @enderror

                    <label for="password">{{ __('form.input.sandi') }}: </label>
                    <input type="password" name="password" id="password">
                    @error('password')
                        <div class="alert-danger text-danger">Password must be alphanumeric and cannot be less than 8 characters</div>
                    @enderror
                </div>

                <div class="d-flex flex-column gap-2 w-100 my-5">
                    <label for="last_name">{{ __('form.input.nama_belakang') }}: </label>
                    <input type="text" name="last_name" id="last_name">
                    @error('last_name')
                        <div class="alert-danger text-danger">Last name cannot be empty or more than 25 characters</div>
                    @enderror

                    <label for="role">{{ __('form.input.peran') }}: </label>
                    <select name="role" id="role">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                    @error('role')
                        <div class="alert-danger text-danger">Role must be selected</div>
                    @enderror

                    <label for="display_picture">{{ __('form.input.gambar_tampilan') }}: </label>
                    <input type="file" name="display_picture" id="display_picture">
                    @error('display_picture')
                        <div class="alert-danger text-danger">Display picture cannot be empty and must be an image</div>
                    @enderror

                    <label for="confirm_pass">{{ __('form.input.konfirmasi_sandi') }}: </label>
                    <input type="password" name="confirm_pass" id="confirm_pass">
                    @error('confirm_pass')
                        <div class="alert-danger text-danger">Password does not match</div>
                    @enderror
                </div>
            </div>

            <button>{{ __('form.submit') }}</button>
        </form>

        <a href="/login" class="d-flex justify-content-center">{{ __('form.login') }}</a>
        
    @endsection
@endsection