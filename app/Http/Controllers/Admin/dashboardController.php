<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function homeDashboard() {

        $totalRevenue = DB::table('orders')
        ->where('status', 'completed') // Chỉ lấy các đơn hàng đã hoàn thành
        ->sum('total');

        $totalOrders = DB::table('orders')
    ->where('status', 'completed')
    ->count();

$monthlyRevenue = DB::table('orders')
    ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as revenue')
    ->where('status', 'completed')
    ->groupBy('year', 'month')
    ->orderBy('year', 'desc')
    ->orderBy('month', 'desc')
    ->get();

        
        return view('admin.dashboard.index', compact('totalRevenue', 'totalOrders', 'monthlyRevenue'));
    }
}
