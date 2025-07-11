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
        return view('home.index', compact('products', 'categories'));

    }
}
