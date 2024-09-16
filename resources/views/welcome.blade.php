@extends('layouts.app')
@section('content')

    <div class="d-flex justify-content-end pe-5" style="position: fixed; width: 100%; z-index: 3;">
        <div style="position: relative;">
            <a href="/cart" class="text-decoration-none text-blue">
                <ion-icon name="cart" style="font-size: 3em;"></ion-icon>
                <span id="cart-count" class="cart-count">{{ $cartCount }}</span>
                <span class="cart-badge" id="cart-badge">+1</span>
            </a>
        </div>
    </div>
    <div class="container my-5">
        <div class="d-flex justify-content-center">
            <img src="/images/logo-stellarina.jpeg" alt="stellarina logo" class="img-fluid ms-2" style="max-height: 200px; height: 100%; width: auto;">
        </div>
        <div class="d-flex justify-content-center"><img src="/images/stellarina.png" alt="" class="img-fluid me-4"></div>
        <div id="fold" class="my-5 shadow p-5" style="border-right: 20px solid #AA83BC; border-bottom: 20px solid #AA83BC">
            <div>
                <h1 class="text-center">Meet <span style="text-shadow: 4px 4px 2px rgba(255, 167, 165, 0.5);">Stellarina</span>, <span class="text-muted">the golden retriever who loves to dance!</span></h1>
                <p class="text-center">
                    The Stellarina series is a special family project of Misty Lown, the writer, and her niece, Olivia Lown, the illustrator. In real life, Stellarina is inspired by Misty’s golden retriever, Stella, who loves going to the dance studio with her mom, and Jake, the family German shepherd. Reggie and Daisy belong to Olivia and her family. Reggie is a golden doodle rescue pup, and Daisy is a black lab. All of the pups are happy to bring a smile to the faces of kids through this book, just like they do in real life, and to help support shelter animals, as a portion of the proceeds from this series will be donated to our local animal shelters.
                </p>
{{--                <div class="d-flex justify-content-center">--}}
{{--                    <a href="/products" style="color: black;">--}}
{{--                        <div class="btn btn-lg btn-pink shadow">Shop</div>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
        <div id="book-1" class="my-5 py-5">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 d-flex align-items-center justify-content-center">
                <div class="my-2">
                    <h2><span class="text-blue fw-bold text-uppercase" style="font-size: 1.33em;">Book 1</span> Stellarina's First Dance Class</h2>
                    <p>
                        Join Stellarina as she attends her first dance class, meets her first dance teacher, and finds new friends! She’s excited (and a little nervous!), but once she enters the room, she finds dancing with her new friends is even more fun than she imagined. After reading this book, follow Stellarina’s other adventures with her new friends Jazzy Jake, Dancin’ Daisy, and Rescue Reggie!
                    </p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-lg btn-pink shadow add-to-cart" data-price-id="{{ $bookOne['price_id'] }}">Add to Cart</button>
                    </div>
                </div>
                <div class="my-2 d-flex justify-content-center">
                    <img src="/images/cover-book-1.jpg" class="img-fluid rounded-book shadow d-none d-md-block" alt="" style="max-height: 550px; height: 100%; width: auto; transform: rotate(5deg);">
                    <img src="/images/cover-book-1.jpg" class="img-fluid rounded-book shadow d-block d-md-none" alt="" style="max-height: 350px; height: 100%; width: auto;">
                </div>
            </div>
            <img src="/images/pages-book-1.png" alt="" class="img-fluid">
        </div>
{{--        <div id="book-1" class="my-5 py-5">--}}
{{--            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 d-flex align-items-center justify-content-center">--}}
{{--                <div class="my-2">--}}
{{--                    <h2><span class="text-blue fw-bold text-uppercase" style="font-size: 1.33em;">Book 1</span> Stellarina's First Dance Class</h2>--}}
{{--                    <p>--}}
{{--                        Join Stellarina as she attends her first dance class, meets her first dance teacher, and finds new friends! She’s excited (and a little nervous!), but once she enters the room, she finds dancing with her new friends is even more fun than she imagined. After reading this book, follow Stellarina’s other adventures with her new friends Jazzy Jake, Dancin’ Daisy, and Rescue Reggie!--}}
{{--                    </p>--}}
{{--                    <div class="d-flex justify-content-center">--}}
{{--                    <a href="/products" style="color: black;">--}}
{{--                        <div class="btn btn-lg btn-pink shadow">Buy Now!</div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                </div>--}}
{{--                <div class="my-2 d-flex justify-content-center">--}}
{{--                    <img src="/images/cover-book-1.jpg" class="img-fluid rounded-book shadow" alt="" style="max-height: 550px; height: 100%; width: auto; transform: rotate(5deg);">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <img src="/images/pages-book-1.png" alt="" class="img-fluid">--}}
{{--        </div>--}}
        <div id="book-2" class="my-5 py-5">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 d-flex align-items-center justify-content-center">
                <div class="my-2">
                    <h2><span class="text-yellow fw-bold text-uppercase" style="font-size: 1.33em;">Book 2</span> Stellarina and the Missing Dance Shoes</h2>
                    <p>
                        Join Stellarina as she gets ready for her weekly dance class. She’s excited to get to the studio, but when she looks for her dance shoes, they are nowhere to be found! Follow along as she searches for her dance shoes and learns about caring for her belongings with the help of her friends. After reading this book, follow Stellarina’s other adventures with her new friends Jazzy Jake, Dancin’ Daisy, and Rescue Reggie!
                    </p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-lg btn-pink shadow add-to-cart" data-price-id="{{ $bookTwo['price_id'] }}">Add to Cart</button>
                    </div>
                </div>
                <div class="my-2 d-flex justify-content-center">
                    <img src="/images/cover-book-2.jpg" class="img-fluid rounded-book shadow d-none d-md-block" alt="" style="max-height: 550px; height: 100%; width: auto; transform: rotate(5deg);">
                    <img src="/images/cover-book-2.jpg" class="img-fluid rounded-book shadow d-block d-md-none" alt="" style="max-height: 350px; height: 100%; width: auto;">
                </div>
            </div>
            <img src="/images/pages-book-2.png" alt="" class="img-fluid">
        </div>
        <div id="book-3" class="my-5 py-5">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 d-flex align-items-center justify-content-center">
                <div class="my-2">
                    <h2><span class="text-purple fw-bold text-uppercase" style="font-size: 1.33em;">Book 3</span> Stellarina Takes the Stage</h2>
                    <p>
                        Join Stellarina as she prepares for her first recital and learns about courage. She’s excited to try on her costume and go to the theatre, but she becomes nervous when she sees the stage! Follow along as she learns about doing her best and being brave with the help of her teacher and friends. After reading this book, follow Stellarina’s other adventures with her new friends Jazzy Jake, Dancin’ Daisy, and Rescue Reggie!
                    </p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-lg btn-pink shadow add-to-cart" data-price-id="{{ $bookThree['price_id'] }}">Add to Cart</button>
                    </div>
                </div>
                <div class="my-2 d-flex justify-content-center">
                    <img src="/images/cover-book-3.jpg" class="img-fluid rounded-book shadow d-none d-md-block" alt="" style="max-height: 550px; height: 100%; width: auto; transform: rotate(5deg);">
                    <img src="/images/cover-book-3.jpg" class="img-fluid rounded-book shadow d-block d-md-none" alt="" style="max-height: 350px; height: 100%; width: auto;">
                </div>
            </div>
            <img src="/images/pages-book-3.png" alt="" class="img-fluid">
        </div>
{{--        <div id="cta" class="my-5 py-5">--}}
{{--            <div class="shadow p-5" style="border-right: 20px solid #10C1EA; border-bottom: 20px solid #10C1EA">--}}
{{--                <h3 class="text-center">Order Your <span style="text-shadow: 4px 4px 2px rgba(255, 167, 165, 0.5);">Stellarina</span> book or series today!</h3>--}}
{{--                <p class="text-center">--}}
{{--                    Are you ready to bring the JOY of Stellarina and friends to your students or a child you love? Click below to place your order today!--}}
{{--                </p>--}}
{{--                <div class="d-flex justify-content-center">--}}
{{--                    <a href="/products" style="color: black;">--}}
{{--                        <div class="btn btn-lg btn-pink shadow">Shop</div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
        <div id="about" class="my-5 py-5">
            <h3 class="text-center">Meet the <span style="text-shadow: 4px 4px 2px rgba(244, 236, 67, 0.5);">Author</span> and <span style="text-shadow: 4px 4px 2px rgba(170, 131, 188, 0.5);">Illustrator</span></h3>
            <div class="row row-cols-1-row-cols-sm-1 row-cols-md-2 row-cols-lg-2 card-group-md">
                <div class="card" style="border: none;">
                    <img src="/images/about-misty.jpg" alt="" class="img-fluid" style="height: 500px; width: 100%; object-fit: cover; object-position: center; border-right: 20px solid #F4EC43">
                    <p class="shadow p-5" style="height: 100%; border-right: 20px solid #F4EC43; border-bottom: 20px solid #F4EC43;">
                        Misty Lown is the founder of Misty’s Dance Unlimited, a dance studio in Wisconsin, and More Than Just Great Dancing!® – A dance studio affiliation program that reaches over 100,000 dance students weekly. She has been awarded the “Pope John XXIII Award for Distinguished Service” by Viterbo University and is also the author of One Small Yes, an Amazon #1 Bestseller. She is a passionate supporter of children and animals and a “real life” owner of Stella and Jake.
                    </p>
                </div>
                <div class="card" style="border: none;">
                    <img src="/images/about-olivia.jpg" alt="" class="img-fluid" style="height: 500px; width: 100%; object-fit: cover; object-position: center; border-right: 20px solid #AA83BC">
                    <p class="shadow p-5" style="height: 100%; border-right: 20px solid #AA83BC; border-bottom: 20px solid #AA83BC;">
                        Olivia Lown is a student, athlete, and illustrator of this book! She will graduate high school from Franklin Road Academy in the spring of 2025 and begin her college journey in the fall of 2025. She is a proud owner of the “real life” Reggie and Daisy, an animal lover, and she cannot wait to share this book.
                    </p>
                </div>
            </div>
        </div>
        <div id="thanks" class="mt-5 pt-5">
            <div>
                <h3 class="text-center">Meet the <span style="text-shadow: 4px 4px 2px rgba(132, 205, 242, 0.5);">Characters</span></h3>
                <img src="/images/meet-the-dogs.jpg" alt="" class="img-fluid" style="border-bottom: 20px solid #84CDF2;">
                <h1 class="text-center mt-5">Thank You For Visiting!</h1>
                <div class="text-center">
                    <small class="text-muted">
                        A Friendly Pets Book
                        <br> Published by Educational Standards, LLC
                        <br>Printed in USA
                        <br>
                        <br>Text copyright © 2024 by Misty Lown
                        <br>Illustration copyright © 2024 by Olivia Lown
                        <br>Design: Megan McCluskey, Atypik Studios, LLC
                        <br>1st printing, 2024
                        <br>
                        <br>All rights reserved. No portion of this book may be reproduced in any form without written permission from the publisher or author except as permitted by U.S. copyright law.
                    </small>
                </div>
            </div>
        </div>
    </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // $('.add-to-cart').on('click', function() {
        $('body').on('click', '.add-to-cart', function() {
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
                }
                // error: function(xhr) {
                //     alert('Error adding product to cart.');
                // }
            });
        });
    });
</script>
