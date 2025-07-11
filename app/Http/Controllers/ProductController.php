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

        $priceInUsd = $product->price / ((int) $sellerCountry->usd_value);
        $convertedPrice = round($priceInUsd * $userCountry->usd_value, 2);

        if($userCountry == $sellerCountry){
            $price = round($product->price * ((100 - $product->discount) / 100), 2);
        }

        $isSameCountry = ($userCountry == $sellerCountry);
        $symbol = $user->country->currency_symbol;

        return view('product-details', compact('product', 'price', 'isSameCountry', 'convertedPrice', 'symbol'));
    }
}