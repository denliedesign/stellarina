<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Stripe\StripeClient;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->get();

        $products = collect();
        foreach ($cartItems as $item) {
            $price = $stripe->prices->retrieve($item->price_id, ['expand' => ['product']]);
            $products->push([
                'cart_id' => $item->id, // Include the cart item ID for removal purposes
                'name' => $price->product->name,
                'description' => $price->product->description,
                'price' => $price->unit_amount / 100,
                'currency' => strtoupper($price->currency),
                'image' => $price->product->images[0] ?? null,
                'quantity' => $item->quantity
            ]);
        }

        return view('cart.index', ['products' => $products]);
    }

    // Display cart items
//    public function index(Request $request)
//    {
//        $sessionId = $request->session()->getId();
//        $cartItems = Cart::where('session_id', $sessionId)->get();
//        return view('cart.index', compact('cartItems'));
//    }

    // Add item to cart
    public function addToCart(Request $request)
    {
        $sessionId = session()->getId(); // Or user id if authenticated
        $cartItem = Cart::create([
            'session_id' => $sessionId,
            'price_id' => $request->price_id,
            'quantity' => $request->quantity
        ]);

        // Update session cart count
        $currentCount = session('cart_count', 0);
        session(['cart_count' => $currentCount + $request->quantity]);

        return response()->json(['success' => true, 'message' => 'Item added to cart']);
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $originalQuantity = $cartItem->quantity;
        $newQuantity = $request->quantity;

        $cartItem->update(['quantity' => $newQuantity]);

        // Update session cart count
        $currentCount = session('cart_count', 0);
        $currentCount = $currentCount - $originalQuantity + $newQuantity;
        session(['cart_count' => $currentCount]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }


    // Remove item from cart
    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);
        $currentCount = session('cart_count', 0);
        session(['cart_count' => max(0, $currentCount - $cartItem->quantity)]);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart!');
    }

    public function getCartCount()
    {
        return response()->json(['cart_count' => session('cart_count', 0)]);
    }
}
