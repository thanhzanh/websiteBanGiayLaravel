<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ordersController extends Controller
{
    public function index(Request $request) {

        $searchOrder = $request->input('code');

        $ordersQuery = DB::table('orders');

        if ($searchOrder) {
            $ordersQuery->where('code', 'like', '%' . $searchOrder . '%');
        }

        $requestStatus = $request->input('status');

        // trạng thái
        $listStatusOrder = [
            [
                'name' => 'Tất cả',
                'status' => '',
                'class' => ''
            ],
            [
                'name' => 'Chờ xử lý',
                'status' => 'pending',
                'class' => ''
            ],
            [
                'name' => 'Đang giao hàng',
                'status' => 'delivering',
                'class' => ''
            ],
            [
                'name' => 'Hoàn thành',
                'status' => 'completed',
                'class' => ''
            ],
        ];

        // doi mau khi thay doi 
        foreach($listStatusOrder as &$item) {
            if ($requestStatus == "" | $requestStatus == null) {
                if ($item['status'] == "") {
                    $item['class'] = "font-bold italic bg-green-500 text-white";
                } 
            } elseif ($item['status'] == $requestStatus) {
                $item['class'] = "font-bold italic bg-green-500 text-white";
            }
        }
        unset($item);

        if ($requestStatus) {
            if ($requestStatus == 'pending') {
                $ordersQuery->where('status', 'pending');
            } elseif ($requestStatus == 'delivering') {
                $ordersQuery->where('status', 'delivering');
            } elseif ($requestStatus == 'completed') {
                $ordersQuery->where('status', 'completed');
            }
        }


        $users = User::all();

        $orders = $ordersQuery->paginate(10);

        return view('admin.pages.order.index', compact('orders', 'users', 'listStatusOrder'));
    }

    public function updateStatus(Request $request, $id) {

        $order = Order::findOrFail($id);

        $order->status = $request->input('status');

        $order->updated_at = Carbon::now();

        $order->save();

        toastr()->success('Đã cập nhật trạng thái đơn hàng');
        return back();
    }

    public function detail(Request $request, $id) {

        $user = session('infoUser');

        $order = DB::table('orders')
                ->where('order_id', $id)
                ->first();

        if ($order) {
            $orderItem = DB::table('orders_detail')->where('order_id', $order->order_id)->get();
        }

        // lay dia chi giao hang
        $userAddress = DB::table('user_addresss')->where('user_address_id', $order->user_address_id)->first();

        $products = Product::all();

        // phuong thuc giao dich
        $transaction = Transaction::where('order_id', $order->order_id)->first();

        return view('admin.pages.order.detail', compact('orderItem', 'order', 'userAddress', 'products', 'transaction'));
    }
}
