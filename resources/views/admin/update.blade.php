@extends('template.template')

@section('head')
    
@endsection

@section('authButton')
    
@endsection

@section('body')
    @section('content')
        <div class="d-flex flex-column p-5">
            <p class="text-decoration-underline fs-4">{{ $user->first_name . ' ' . $user->last_name }}</p>
        <form action="{{ route('updateRole', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="role">Role: </label>
            <select name="role" id="role">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>

            <button class="bg-warning">Save</button>
        </form>
        </div>
    @endsection
@endsection