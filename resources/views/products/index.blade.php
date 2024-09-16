@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mt-4">
            <div style="position: relative;">
                <a href="/cart">
                    <ion-icon name="cart-outline" style="font-size: 2em;"></ion-icon>
                    <span id="cart-count" class="cart-count">{{ $cartCount }}</span>
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <span class="cart-badge" id="cart-badge">+1</span>
                    </div>
                </a>
            </div>
        </div>
        <h1>Available Products</h1>
        <div class="card-group">
            @foreach ($products as $product)
                <div class="col-md-4 m-2">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body row">
                            <div class="col"><img src="{{ $product['image'] }}" alt="Product Image" class="img-fluid"></div>
                            <div class="col">
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <p class="card-text">{{ $product['description'] }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart" data-price-id="{{ $product['price_id'] }}">Add to Cart</button>
                                    </div>
                                    <small class="text-muted">${{ number_format($product['price'], 2) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-to-cart').on('click', function() {
            var priceId = $(this).data('price-id');
            $.ajax({
                url: '{{ route('cart.add') }}',
                type: 'POST',
                data: {
                    price_id: priceId,
                    quantity: 1,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    var cartCount = $('#cart-count');
                    var cartBadge = $('#cart-badge');
                    cartCount.text(parseInt(cartCount.text()) + 1); // Update count in the DOM

                    cartBadge.show().fadeOut(1000); // Show badge and fade out
                },
                error: function(xhr) {
                    alert('Error adding product to cart.');
                }
            });
        });
    });
</script>


