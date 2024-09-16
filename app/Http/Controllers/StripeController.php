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
            'line_items' => $lineItems->toArray(),
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        // Logic to execute after successful checkout
        return view('checkout.success');
    }

    public function cancel()
    {
        // Logic to handle a canceled checkout
        return view('checkout.cancel');
    }
}
