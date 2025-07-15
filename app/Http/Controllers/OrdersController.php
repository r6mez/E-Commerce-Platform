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

    public function indexAll(Request $request)
    {
        $orders = Order::with(['user', 'product'])->get();
        return view('dashboard.orders.manage', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('dashboard.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('dashboard.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        try {
            $request->validate([
                'amount' => 'required|integer|min:1',
            ]);
            $order->amount = $request->input('amount');
            $order->save();
            return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('orders.index')->with('error', 'An error occurred while updating the order.');
        }
    }

    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('orders.index')->with('error', 'An error occurred while deleting the order.');
        }
    }
}
