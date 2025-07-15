<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSellers = User::where('type', 'seller')->count();
        $totalUsers = User::where('type', 'user')->count();
        $totalProductsSoldToday = Order::whereDate('created_at', today())->sum('amount');
        $totalProductsSoldThisMonth = Order::whereMonth('created_at', now()->month)->sum('amount');

        $totalRevenue = Order::join('products', 'orders.product_id', '=', 'products.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->sum(DB::raw('orders.amount * products.price * CAST(countries.usd_value AS float)'));

        $revenueToday = Order::whereDay('orders.created_at', now()->day)
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->sum(DB::raw('orders.amount * products.price * CAST(countries.usd_value AS float)'));

        $topCountries = Order::select(
            'countries.name',
            'countries.iso_code',
            DB::raw('SUM(orders.amount) as total_sales')
        )
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->groupBy('countries.name', 'countries.iso_code')
            ->orderByDesc('total_sales')
            ->limit(4)
            ->get();

        return view('dashboard.dashboard', compact(
            'totalSellers',
            'totalUsers',
            'totalProductsSoldToday',
            'totalProductsSoldThisMonth',
            'topCountries',
            'totalRevenue',
            'revenueToday'
        ));
    }
}