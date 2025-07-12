<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CartItemController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userCountry = $user->country;
        $userUsdValue = (float) $userCountry->usd_value;
        $userCurrencySymbol = $userCountry->currency_symbol;

        $cartItems = \App\Models\CartItem::with(['product.photos', 'product.user.country'])
            ->where('user_id', $user->id)
            ->get()
            ->map(function ($item) use ($userUsdValue) {
                $sellerCountry = $item->product->user->country;
                $sellerUsdValue = (float) $sellerCountry->usd_value;
                $priceInUsd = $item->product->price / ($sellerUsdValue ?: 1);
                $convertedPrice = round($priceInUsd * $userUsdValue, 2);
                $convertedSubtotal = round($convertedPrice * $item->quantity, 2);
                $item->converted_price = $convertedPrice;
                $item->converted_subtotal = $convertedSubtotal;
                return $item;
            });

        return view('cart.index', compact('cartItems', 'userCurrencySymbol'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::where('user_id', $validated['user_id'])
            ->where('product_id', $validated['product_id'])
            ->first();

        if ($cartItem) {
            $product = \App\Models\Product::find($validated['product_id']);
            $newQuantity = $cartItem->quantity + $validated['quantity'];
            $cartItem->quantity = min($newQuantity, $product->quantity);
            $cartItem->save();
        } else {
            $product = \App\Models\Product::find($validated['product_id']);
            $quantity = min($validated['quantity'], $product->quantity);
            CartItem::create([
                'user_id' => $validated['user_id'],
                'product_id' => $validated['product_id'],
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartItem $cartItem)
    {
        if ($cartItem->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cartItem->product->quantity,
        ]);
        $cartItem->quantity = $validated['quantity'];
        $cartItem->save();
        return redirect()->back()->with('success', 'Cart item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        if ($cartItem->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $cartItem->delete();
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
