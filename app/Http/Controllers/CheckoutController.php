<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }
        foreach ($cartItems as $item) {
            Order::create([
                'user_id' => $user->id,
                'product_id' => $item->product_id,
                'amount' => $item->quantity,
            ]);
            $item->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Checkout successful!');
    }
}
