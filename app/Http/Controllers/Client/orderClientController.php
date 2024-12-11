<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\UserAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Str;

class orderClientController extends Controller
{
    // checkout
    // [GET] /cart
    public function checkout(Request $request)
    {
        $infoUser = session('infoUser');
        $addresses = UserAddress::where('user_id', $infoUser->user_id)->get();

        $defaultAddress = UserAddress::where('user_id', $infoUser->user_id)->where('is_default', true)->first(); // Lấy địa chỉ mặc định của người dùng

        $sessionId = $request->session()->getId();

        // lấy sản phẩm giỏ hàng để thanh toán
        if ($infoUser) {
            $cart = Cart::where(['user_id' => $infoUser->user_id, 'session_id' => null])->first();
        } else {
            $cart = Cart::where(['user_id' => null, 'session_id' => $sessionId])->first();
        }
        $cartItem = CartItem::where('cart_id', $cart->cart_id)->get();

        $products = Product::all();

        // tong don
        $total = 0;
        foreach ($cartItem as $item) {
            foreach ($products as $product) {
                if ($item->product_id == $product->product_id) {
                    $total += $item->price * $item->quantity;
                }
            }
        }

        return view('client.pages.cart.check-out', compact('addresses', 'defaultAddress', 'cartItem', 'products', 'total'));
    }

    public function createOrder(Request $request)
    {

        try {
            $user = session('infoUser');
            $userAddressesId = $request->user_address_id;
            $payment_method = $request->payment_method;
            $total = $request->total;

            // Tạo mã đơn hàng duy nhất
            $number = mt_rand(1000, 9999);
            $code = 'ORDER' . $number;

            // Chuyển cartItems từ JSON thành mảng PHP
            $cartItems = json_decode($request->input('cartItem', '[]'), true);

            // Tạo đơn hàng
            $order = Order::create([
                'code' => $code,
                'user_id' => $user->user_id,
                'user_address_id' => $userAddressesId,
                'status' => 'pending',
                'total' => $total,
            ]);

            // Lưu chi tiết đơn hàng và xóa sản phẩm trong giỏ hàng
            foreach ($cartItems as $cartItem) {
                OrderDetail::create([
                    'order_id' => $order->order_id,
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                    'price' => $cartItem['price'],
                    'total' => $total,
                ]);

                DB::table('cart_items')->where('cart_id', $cartItem['cart_id'])->delete();
            }

            // Xử lý trạng thái thanh toán
            if ($payment_method === 'cod') {
                $order->update(['status' => 'completed']);
                $order->updated_at = now();

                Transaction::create([
                    'order_id' => $order->order_id,
                    'payment_method' => $payment_method,
                    'status' => 'pending',
                    'amount' => $total
                ]);

                toastr()->success('Đặt đơn hàng thành công');
                return redirect()->route('home');
            } elseif ($payment_method == 'bank') {

                // Transaction::create([
                //     'order_id' => $order->order_id,
                //     'payment_method' => $payment_method,
                //     'status' => 'pending',
                //     'amount' => $total
                // ]);
                
                return redirect()->route('payment.create', ['order_id' => $order->order_id]);
            }
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());
            return redirect()->route('home');
        }
    }
}
