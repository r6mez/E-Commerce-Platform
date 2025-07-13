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
        return view('order.index', compact('orders'));
    }
    public function showAll(Request $request)
    {
        $orders = Order::paginate(5);
        return view('dashboard.orders.manage', compact('orders'));
    }

    public function showOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('dashboard.orders.show', compact('order'));
    }

    public function editOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('dashboard.orders.edit', compact('order'));
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'amount' => 'required|integer|min:1',
        ]);
        $order->amount = $request->input('amount');
        $order->save();
        return redirect()->route('manageOrders');
    }

    public function destroyOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('manageOrders');
    }
}
ini_set('max_execution_time', 60);
