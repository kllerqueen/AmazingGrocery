@extends('template.template')

@section('head')
    
@endsection

@section('body')
    @section('content')
        <div class="d-flex flex-column min-vh-100">
            <div class="px-5">
                <u class="fs-3 fw-semibold px-5">{{ $item->name }}</u>
            </div>
    
            <div class="d-flex p-5">
                <div>
                    <img src="{{ asset('storage/images/veggie.png') }}" alt="/" class="w-75" >
                </div>
                <div class="d-flex flex-column gap-3">
                    <p class="fs-3 fw-semibold">Price: Rp. {{ $item->price }}</p>

                    <p class="fs-3">{{ $item->description }}</p>

                    <form action="{{ route('addToCart', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-end">
                            <button class="w-25 bg-warning py-2">Buy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
@endsection