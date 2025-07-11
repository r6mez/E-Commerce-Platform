<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::take(6)->get(); 
        $categories = Category::all(); 

        foreach ($products as $product) {
            $product->price = $product->price * $product->user->country->usd_value;
        }

        return view('home.index', compact('products', 'categories'));

    }
}
