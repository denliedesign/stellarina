<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;
use App\Models\Cart;

class StripeController extends Controller
{
    public function createSession(Request $request)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->get();

        $lineItems = $cartItems->map(function ($item) {
            return [
                'price' => $item->price_id,
                'quantity' => $item->quantity
            ];
        });

        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'shipping_address_collection' => [
                'allowed_countries' => ['US', 'CA'], // Modify as per your requirement
            ],
            'line_items' => $lineItems->toArray(),
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
            'automatic_tax' => ['enabled' => true],
            'allow_promotion_codes' => true,
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->session()->getId();
        Cart::where('session_id', $sessionId)->delete();
        // Logic to execute after successful checkout
        session()->forget('cartItems');
        $request->session()->put('cart_count', 0);
        return view('checkout.success');
    }

    public function cancel()
    {
        // Logic to handle a canceled checkout
        return view('checkout.cancel');
    }
}
