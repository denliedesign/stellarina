<?php
namespace App\Http\Controllers;

use Stripe\StripeClient;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $stripe = new \Stripe\StripeClient(
            config('services.stripe.secret')
        );

        // Specific price IDs for featured products
        $bookOnePriceId = 'price_1Q2g7wP1afA893GfaNHVxLF7';
        $bookTwoPriceId = 'price_1Q2g80P1afA893GfNwNaZ3FU';
        $bookThreePriceId = 'price_1Q2g84P1afA893Gf4Moumuru';

        $bookOne = $this->fetchProductDetails($stripe, $bookOnePriceId);
        $bookTwo = $this->fetchProductDetails($stripe, $bookTwoPriceId);
        $bookThree = $this->fetchProductDetails($stripe, $bookThreePriceId);

        return view('welcome', ['bookOne' => $bookOne, 'bookTwo' => $bookTwo, 'bookThree' => $bookThree]);
    }

    private function fetchProductDetails($stripe, $priceId)
    {
        $price = $stripe->prices->retrieve($priceId, ['expand' => ['product']]);
        return [
//            'name' => $price->product->name,
//            'description' => $price->product->description ?? 'No description available.',
//            'price' => number_format($price->unit_amount / 100, 2),
//            'currency' => strtoupper($price->currency),
//            'image' => $price->product->images[0] ?? 'default-image.jpg',  // Default image if none
            'price_id' => $priceId
        ];
    }

//    public function indexAll()
//    {
//        $stripe = new StripeClient(env('STRIPE_SECRET'));
//
//        // Fetch products and prices
//        $stripeProducts = $stripe->products->all(['active' => true, 'limit' => 10]);
//        $stripePrices = $stripe->prices->all(['active' => true, 'limit' => 10]);
//
//        $products = [];
//        foreach ($stripePrices->data as $price) {
//            if ($product = $this->findProduct($stripeProducts->data, $price->product)) {
//                // Retrieve the first image if available, otherwise provide a default placeholder
//                $image = !empty($product->images) ? $product->images[0] : 'path/to/default/image.jpg'; // Provide a default image path as needed
//
//                $products[] = [
//                    'id' => $product->id,
//                    'name' => $product->name,
//                    'description' => $product->description ?? 'No description available.',
//                    'price' => $price->unit_amount / 100,
//                    'price_id' => $price->id,
//                    'image' => $image // Add the image URL to the product array
//                ];
//            }
//        }
//
//        return view('products.index', ['products' => $products]);
//    }
//
//    private function findProduct($products, $productId)
//    {
//        foreach ($products as $product) {
//            if ($product->id == $productId) {
//                return $product;
//            }
//        }
//        return null;
//    }
}
