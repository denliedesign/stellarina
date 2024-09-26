@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <img src="/images/logo-stellarina.jpeg" alt="stellarina logo" class="img-fluid ms-2" style="max-height: 200px; height: 100%; width: auto;">
        </div>
        <h1>Checkout Successful</h1>
        <p><span class="badge text-bg-success">Your payment has been processed successfully.</span></p>
        <p class="mt-0 pt-0">Thank you for your order! We will get our paws on it and out to you soon! -Stellarina <ion-icon name="paw" style="color: #D09751; font-size: 1.5em; transform: rotate(20deg);"></ion-icon></p>
        <a class="btn btn-pink btn-lg shadow" href="/">Home</a>
    </div>
@endsection
