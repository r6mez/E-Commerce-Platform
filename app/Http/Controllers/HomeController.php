<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::take(6)->get();
        $categories = Category::take(11)->get();

        return view('home.index', compact('products', 'categories'));
    }
}
