@extends('template.template')

@section('head')
    
@endsection

@section('body')
    @section('content')
        <div class="d-flex flex-column w-100">
            <div class="d-flex flex-wrap gap-5 justify-content-center p-5 my-5">
                @foreach ($items as $i)
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('storage/images/veggie.png') }}" alt="/" class="w-25">
                    <p class="fs-5">{{ $i->name }}</p>
                    <a href="/veggie-{{ $i->id }}" class="fs-5">Detail</a>
                </div>
            @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <div class="d-flex justify-content-between">
                    {{ $items->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    @endsection
@endsection