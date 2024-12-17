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

        $sessionId = $request->session()->getId();

        // lấy sản phẩm giỏ hàng để thanh toán
        if (!$infoUser) {
            
            $cart = Cart::where(['session_id' => $sessionId])->first();
            // nếu giỏ hàng không có sản phẩm
            if (!$cart) {
                toastr()->info('Giỏ hàng trống. Vui lòng thêm sản phẩm');
                return redirect()->route('product');
            }
            toastr()->info('Bạn cần phải đăng nhập để tiến hành thanh toán');
            return redirect()->route('account.login');
            
        }

        // chuyển sản phẩm từ giỏ hàng có session sang user
        $this->transferSessionCartToUser($sessionId, $infoUser->user_id);
        // end

        $addresses = UserAddress::where('user_id', $infoUser->user_id)->get();

        $defaultAddress = UserAddress::where('user_id', $infoUser->user_id)->where('is_default', true)->first(); // Lấy địa chỉ mặc định của người dùng

        // giỏ hàng gắn với user_id người dùng
        $cart = Cart::where('user_id', $infoUser->user_id)->first();

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

    public function transferSessionCartToUser($sessionId, $userId) {
        // tìm giỏ hàng
        $sessionIdCart = Cart::where('session_id', $sessionId)->first();

        if ($sessionIdCart) {

            // tìm giỏ hàng
            $cart = Cart::firstOrCreate(['user_id' => $userId, 'session_id' => null]);

            // chuyển sang phẩm từ session cart sang user cart
            $sessionCartItems = CartItem::where('cart_id', $sessionIdCart->cart_id)->get();

            // dd($cart, $sessionIdCart, $cartItems);

            foreach ($sessionCartItems as $item)
            {
                // $priceNew = $product->price - ($product->price * ($product->discount) / 100);

                $productExistingItem = CartItem::where('cart_id', $cart->cart_id)
                                                ->where('product_id', $item->product_id)
                                                ->where('size_id', $item->size_id)->first();

                if ($productExistingItem) {
                    $productExistingItem->quantity += $item->quantity;
                    $productExistingItem->save();
                } else {
                    // Tạo mới CartDetail
                    CartItem::create([
                        'cart_id' => $cart->cart_id,
                        'product_id' => $item->product_id,
                        'size_id' => is_object($item->size) ? $item->size->size_id : $item->size,
                        'quantity' => $item->quantity,
                        'price' => $item->price
                    ]);
                }
            }
            // xóa session sau khi chuyển
            $sessionIdCart->delete();
        }
    }

    public function createOrder(Request $request)
    {
        try {
            $user = session('infoUser');
            $userAddressesId = $request->user_address_id;
            $payment_method = $request->payment_method;
            $total = $request->total;

            // check co địa chỉ chưa
            $defaultAddress = UserAddress::where('user_id', $user->user_id)->where('is_default', true)->first(); // Lấy địa chỉ mặc định của người dùng
            if(!$defaultAddress) {
                toastr()->error('Vui lòng thêm địa chỉ giao hàng');
                return back();
            }

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

                DB::table('product')->where('product_id', $cartItem['product_id'])->decrement('quantity', $cartItem['quantity']);

            }

            // Xử lý trạng thái thanh toán
            if ($payment_method === 'cod') {
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
                
                return redirect()->route('payment.create', ['order_id' => $order->order_id]);
            }
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());
            return redirect()->route('home');
        }
    }

    public function orderIndex() {

        $user = session('infoUser');
        
        $orders = DB::table('orders')->where('user_id', $user->user_id)->get();

        // lay tat ca don hang
        $orderItems = [];
        foreach($orders as $order) {
            $order->items = DB::table('orders_detail')->where('order_id', $order->order_id)->get();
            $orderItems[] = $order;


        }

        $products = Product::all();

        return view('client.pages.order.index', compact('orders','orderItems', 'products'));
    }

    public function detail($id) {

        $user = session('infoUser');
        
        $order = Order::with(['items', 'items.product', 'items.product.images'])
                ->where('user_id', $user->user_id)
                ->where('order_id', $id)
                ->first();

        // dd($order);

        $userAddress = UserAddress::where('user_id', $user->user_id)->get();
        // dd($userAddress);

        $products = Product::all();

        $transaction = DB::table('transaction')->where('order_id', $order->order_id)->get();

        return view('client.pages.order.detail', compact('order', 'products', 'transaction', 'userAddress'));
    }
}
