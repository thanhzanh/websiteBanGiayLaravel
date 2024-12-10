<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Size;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cartClientController extends Controller
{
    // [GET] /cart
    public function index()
    {

        $infoUser = session('infoUser', null);
        $sessionId = session()->getId();

        // neu khach hang dang nhap, ngc lai khac chua dang nhap
        if ($infoUser && isset($infoUser->user_id)) {
            $carts = DB::table('cart')->where('user_id', $infoUser->user_id)->first();
        } else {
            $carts = DB::table('cart')->where('session_id', $sessionId)->first();
        }

        // neu co gio hang
        if ($carts) {
            $cartItems = DB::table('cart_items')->where('cart_id', $carts->cart_id)->get(); // get() la lay ra san gio hang chi tiet theo cart_id
        }

        // lay ra data bang sizes
        $sizes = Size::all();

        // lay ra data bang san pham
        $products = Product::all();

        return view('client.pages.cart.index', ['products' => $products, 'sizes' => $sizes, 'cartItems' => $cartItems]);
    }

    // [POST] /cart/add/{id}
    public function addPost(Request $request, $id)
    {

        $userInfo = session('infoUser', null);

        $sessionId = $request->session()->getId();

        // lấy giá sản phẩn từ bảng product
        $product = Product::findOrFail($id);
        $priceNew = $product->price - ($product->price * ($product->discount) / 100);

        // Nếu người dùng đã đăng nhập, dùng user_id, nếu không thì dùng session_id
        if ($userInfo) {
            $cart = Cart::firstOrCreate(
                ['user_id' => $userInfo->user_id, 'session_id' => null]
            );
        } else {
            $cart = Cart::firstOrCreate(
                ['user_id' => null, 'session_id' => $sessionId]
            );
        }
        

        // kiểm tra sản phẩm tồn tại size trong giỏ hàng chưa
        $cartItem = CartItem::where('cart_id', $cart->cart_id)
            ->where('product_id', $id)
            ->where('size_id', $request->size)->first();

        // neu co san pham voi size do roi thi cap nhat lai so luong
        if ($cartItem) {
            $cartItem->update([
                'quantity' => $request->quantity + $cartItem->quantity,
            ]);
        } else {
            // Tạo mới CartDetail
            CartItem::create([
                'cart_id' => $cart->cart_id,
                'product_id' => $id,
                'size_id' => $request->size,
                'quantity' => $request->quantity,
                'price' => $priceNew
            ]);
        }

        toastr()->success('Đã thêm sản phẩm vào giỏ hàng');

        return back();
    }


    // [DELETE] /cart/delete/{id}
    public function delete($id)
    {

        $deleted = DB::table('cart_items')->where('id', $id)->delete();

        if ($deleted) {
            toastr()->success('Sản phẩm đã được xóa khỏi giỏ hàng');
        } else {
            toastr()->error('Không tìm thấy sản phẩm để xóa');
        }

        return back();
    }

    // [GET] /cart/update/{quantity}/{productId}
    public function update(Request $request, $quantity, $productId)
    {
        $user = session('infoUser'); // nguoi dung dang nhap

        $sessionId = $request->session()->getId(); // nguoi dung khong dang nhap

        // Nếu người dùng đã đăng nhập, dùng user_id, nếu không thì dùng session_id
        if ($user) {
            $cart = Cart::firstOrCreate(
                ['user_id' => $user->user_id, 'session_id' => null]
            );
        } else {
            $cart = Cart::firstOrCreate(
                ['session_id' => $sessionId, 'user_id' => null]
            );
        }

        // kiểm tra sản phẩm tồn tại size trong giỏ hàng chưa
        $cartItem = CartItem::where('cart_id', $cart->cart_id)
            ->where('product_id', $productId)->first();

        // neu co san pham voi size do roi thi cap nhat lai so luong
        if ($cartItem) {
            $cartItem->update([
                'quantity' => $quantity,
            ]);
        }
        toastr()->success('Đã cập nhật số lượng sản phẩm trong giỏ hàng');
        return back();
    }

    // checkout
    // [GET] /cart
    public function checkout()
    {
        $infoUser = session('infoUser');
        $addresses = UserAddress::where('user_id', $infoUser->user_id)->get();

        $defaultAddress = UserAddress::where('user_id', $infoUser->user_id)->where('is_default', true)->first(); // Lấy địa chỉ mặc định của người dùng

        return view('client.pages.cart.check-out', compact('addresses', 'defaultAddress'));
    }

}
