<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function homeDashboard() {
        // Tổng doanh thu từ các đơn hàng đã hoàn thành
        $totalRevenue = DB::table('orders')
            ->where('status', 'completed') // Chỉ lấy các đơn hàng đã hoàn thành
            ->sum('total');
    
        // Tổng số đơn hàng đã hoàn thành
        $totalOrders = DB::table('orders')
            ->where('status', 'completed')
            ->count();
    
        // Doanh thu theo từng tháng
        $monthlyRevenue = DB::table('orders')
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as revenue')
            ->where('status', 'completed')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
    
        // Định dạng dữ liệu cho biểu đồ
        $chartData = [
            'labels' => $monthlyRevenue->map(fn($data) => $data->month . '/' . $data->year)->toArray(),
            'data' => $monthlyRevenue->pluck('revenue')->toArray(),
        ];

        // Tổng số khách hàng
        $users = DB::table('users')->count();

        // Tổng số sản phẩm
        $products = DB::table('product')->count();

        // Tổng số khách hàng
        $categorys = DB::table('product_category')->count();
    
        // Truyền dữ liệu vào view
        return view('admin.dashboard.index', compact('totalRevenue', 'totalOrders', 'chartData', 'users', 'products', 'categorys'));
    }
    
}
