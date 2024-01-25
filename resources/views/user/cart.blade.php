@extends('template.template')

@section('head')
    
@endsection

@section('body')
    @section('content')
        <div class="d-flex flex-column min-vh-100">
            <div class="px-5">
                <u class="fs-3 fw-semibold px-5">Cart</u>
            </div>

            <div class="d-flex flex-column gap-5 p-5">
                <?php 
                    $priceCounter = 0;    
                ?>
                @foreach ($cartItems as $i)
                    <div class="d-flex flex-row p-5 justify-content-between">
                        <div>
                            <img src="{{ asset('storage/images/veggie.png') }}" alt="/" class="d-flex w-50">
                        </div>
                        <p class="fs-3">Rp. {{ $i->name }}</p>
                        <p class="fs-3">{{ $i->price }}</p>
                        <form action="{{ route('deleteCartItem', $i->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <button class="outline-none">Delete</button>
                        </form>
                        <?php 
                            $priceCounter += $i->price
                        ?>
                    </div>
                @endforeach

                <div class="d-flex flex-row align-items-end justify-content-end gap-3">
                    <p class="fs-3 fw-bold">TOTAL: Rp. {{ $priceCounter }},-</p>
                    <form action="{{ route('checkOut') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')

                        <button class="bg-warning">Checkout</button>
                    </form>
                    
                </div>
            </div>
        </div>
    @endsection
@endsection