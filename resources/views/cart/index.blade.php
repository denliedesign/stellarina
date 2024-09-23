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
                    <form action="{{ route('cart.update', $product['cart_id']) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="quantity-{{ $product['cart_id'] }}"><p><small>Quantity:</small></p></label>
                            <input type="number" id="quantity-{{ $product['cart_id'] }}" name="quantity" value="{{ $product['quantity'] }}" min="1" class="d-inline form-control" style="width: auto;">
                            <button type="submit" class="btn btn-outline-secondary d-inline">Update</button>
                        </div>
                    </form>
                    <form action="{{ route('cart.remove', $product['cart_id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary shadow">Remove</button>
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

<script>
    $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault(); // Stop the form from submitting normally
            var form = $(this);

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    alert('Cart updated successfully!');
                    // Optionally update the page dynamically here
                },
                error: function() {
                    alert('Failed to update the cart.');
                }
            });
        });
    });
</script>
