@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <img src="/images/logo-stellarina.jpeg" alt="stellarina logo" class="img-fluid ms-2" style="max-height: 200px; height: 100%; width: auto;">
        </div>
        <h1>Your Cart</h1>
        @foreach ($products as $product)
            <div class="my-4 div row">
                <div class="col-4 col-md-2"><img src="{{ $product['image'] }}" alt="Product Image" class="img-fluid"></div>
                <div class="col-8 col-md-10">
                    <h5 class="">{{ $product['name'] }}</h5>
                    <p class="d-none d-md-block">{{ $product['description'] }}</p>
                    <p class="">${{ $product['price'] }} {{ $product['currency'] }}</p>
                    <form action="{{ route('cart.remove', $product['cart_id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary">Remove</button>
                    </form>
                </div>
            </div>
        @endforeach

        {{--        @foreach ($cartItems as $item)--}}
{{--            <div>--}}
{{--                <p>{{ $item->price_id }} - Quantity: {{ $item->quantity }}</p>--}}
{{--                <form action="{{ route('cart.remove', $item->id) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit">Remove</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        @endforeach--}}
        <a href="{{ route('checkout.session') }}" class="btn btn-lg btn-pink me-2 shadow">Proceed to Checkout</a>
        <a href="/" class="btn btn-lg btn-outline-secondary mx-2">Back</a>
    </div>
@endsection
