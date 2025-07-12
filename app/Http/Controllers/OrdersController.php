<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('profile.orders', compact('orders'));
    }
    public function showAll(Request $request)
    {
        $orders = Order::paginate(5);
        return view('admin.orders.manage', compact('orders'));
    }
}
ini_set('max_execution_time', 60);
