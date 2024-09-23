@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1>Checkout Canceled</h1>
        <p>You have canceled the checkout process. If there was a problem, please contact us.</p>
        <a class="btn btn-pink btn-lg shadow me-2" href="/cart">Back to Cart</a>
        <a class="btn btn-outline-secondary btn-lg" href="/">Home</a>
    </div>
@endsection
