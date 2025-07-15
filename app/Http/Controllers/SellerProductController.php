<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerProductController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Product::query()->where('user_id', $user->id);

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(12);
        $categories = \App\Models\Category::all();

        return view('product.seller.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.seller.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'details' => 'required|string',
            'quantity' => 'required|integer',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'details' => $request->details,
            'quantity' => $request->quantity,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('products', 'public');
                $product->photos()->create(['photo_url' => $path]);
            }
        }

        return redirect()->route('seller.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $users = User::all();
        return view('product.seller.edit', [
            'product' => $product,
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'discount' => 'required|integer',
            'details' => 'required|string',
            'quantity' => 'required|integer',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $product->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'details' => $request->details,
            'quantity' => $request->quantity,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('products', 'public');
                $product->photos()->create(['photo_url' => $path]);
            }
        }

        return redirect()->route('seller.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroyPhoto(Product $product, Photo $photo)
    {
        Storage::disk('public')->delete($photo->photo_url);
        $photo->delete();
        return redirect()->route('seller.products.edit', [$product])->with('success', 'Photo removed successfully.');
    }
}
