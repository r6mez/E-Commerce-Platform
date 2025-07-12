<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
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
    public function showAll(Request $request)
    {
        $products = Product::orderBy('id')->take(5)->get();
        return view('admin.products.manage', compact('products'));
    }
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id|unique:products,user_id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'details' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        Product::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'details' => $request->details,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('manageProducts');
    }
    public function createProduct(): \Illuminate\Contracts\View\View
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.products.add', [
            'categories' => $categories,
            'users' => $users,
        ]);
    }


    public function editProductInfo($id): \Illuminate\Contracts\View\View
    {
        $categories = Category::all();
        $users = User::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', [
            'product' => $product,
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    public function updateProductInfo(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'details' => 'required|string',
            'enable' => 'required|in:TRUE,FALSE',
            'quantity' => 'required|integer',
        ]);

        $product->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'details' => $request->details,
            'enable' => $request->enable,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('manageProducts');
    }
    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('manageProducts');
    }
}
ini_set('max_execution_time', 60);
