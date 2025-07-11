<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product->load(['user.country', 'photos']);
        
        $user = Auth::user();
        $userCountry = $user->country;
        $sellerCountry = $product->user->country;
        $price = null;
        
        if($user->type == "user" && $userCountry != $sellerCountry){
            abort(403);
        }   

        $priceInUsd = $product->price / ((int) $sellerCountry->usd_value);
        $convertedPrice = round($priceInUsd * $userCountry->usd_value, 2);

        if($userCountry == $sellerCountry){
            $price = round($product->price * ((100 - $product->discount) / 100), 2);
        }

        $isSameCountry = ($userCountry == $sellerCountry);
        $symbol = $user->country->currency_symbol;

        return view('product.show', compact('product', 'price', 'isSameCountry', 'convertedPrice', 'symbol'));
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Product::query();

        if ($user->type === 'user') {
            $query->whereHas('user', function ($q) use ($user) {
                $q->where('country_id', $user->country_id);
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->with(['user.country'])->paginate(12);
        $categories = \App\Models\Category::all();

        return view('product.index', compact('products', 'categories'));
    }
}