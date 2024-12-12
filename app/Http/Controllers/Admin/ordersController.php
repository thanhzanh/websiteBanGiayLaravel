<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ordersController extends Controller
{
    public function index() {

        // $user = session('infoUser');

        $orders = Order::all();

        $users = User::all();

        // dd($orders);

        return view('admin.pages.order.index', compact('orders', 'users'));
    }

    public function updateStatus(Request $request, $id) {

        $order = Order::findOrFail($id);

        $order->status = $request->input('status');

        $order->updated_at = Carbon::now();

        $order->save();

        toastr()->success('Đã cập nhật trạng thái đơn hàng');
        return back();
    }
}
