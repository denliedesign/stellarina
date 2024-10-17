<?php
namespace App\Http\Controllers;

use App\Mail\MerchantNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\StripeClient;
use App\Models\Cart;
use function Monolog\alert;

class StripeController extends Controller
{
    protected $stripe;
    public function createSession(Request $request)
    {
        $shippingCost = 495;
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->get();

        $lineItems = $cartItems->map(function ($item) {
            return [
                'price' => $item->price_id,
                'quantity' => $item->quantity
            ];
        });

        $lineItems->push([
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Shipping',
                ],
                'unit_amount' => $shippingCost,
            ],
            'quantity' => 1,
        ]);

        $session = $this->stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'shipping_address_collection' => [
                'allowed_countries' => ['US', 'CA'], // Modify as per your requirement
            ],
            'line_items' => $lineItems->toArray(),
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
            'automatic_tax' => ['enabled' => true],
            'allow_promotion_codes' => true,
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->session()->getId();
        $stripeSessionId = $request->query('session_id');
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
        $this->sendMerchantNotification($stripeSessionId);
        Cart::where('session_id', $sessionId)->delete();
        // Logic to execute after successful checkout
        session()->forget('cartItems');
        $request->session()->put('cart_count', 0);
        return view('checkout.success');
    }


    protected function sendMerchantNotification($stripeSessionId)
    {
        // Retrieve the full session with line items from Stripe using the session ID
        $sessionDetails = $this->stripe->checkout->sessions->retrieve(
            $stripeSessionId,
            ['expand' => ['line_items']] // Make sure to expand line items if needed
        );

        if (empty($sessionDetails->line_items) || empty($sessionDetails->line_items->data)) {
            Log::error('Line items are missing from the session details.');
        } else {
            \Mail::to(['cindy.mistysdance@gmail.com', 'customdenlie@gmail.com', 'mistylown@gmail.com'])->send(new MerchantNotificationMail($sessionDetails));
        }
    }

    public function cancel()
    {
        // Logic to handle a canceled checkout
        return view('checkout.cancel');
    }
}
