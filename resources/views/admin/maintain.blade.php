@extends('template.template')

@section('head')
    
@endsection

@section('body')
    @section('content')
        <div class="d-flex flex-column min-vh-100">
            <div class="d-flex flex-row justify-content-center px-5 gap-5 my-5">
                <div>
                    <div class="d-flex justify-content-center gap-5">
                        <u class="fs-4 fw-bold mb-2 mx-2">Account</u>
                        <u class="fs-4 fw-bold mb-2 mx-2">Action</u>
                    </div>

                    @foreach ($users as $u)
                            <div class="row align-items-center h-50 mb-3">
                                <div class="col p-5 bg-dark-subtle">
                                    <p>{{ $u->first_name . ' ' . $u->last_name . ' - ' . ($u->role_id == 1 ? 'User' : 'Admin') }}</p>
                                </div>

                                <div class="d-flex flex-row col gap-3 p-5 bg-dark-subtle h-75">
                                    <a href="{{ route('changeRolePage', $u->id) }}">Update Role</a>
                                    <form action="{{ route('deleteUser', $u->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')

                                        <button class="border-0 btn p-0 m-0 text-primary text-decoration-underline d-flex align-items-center">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                </div>
                
        </div>
    @endsection
@endsection