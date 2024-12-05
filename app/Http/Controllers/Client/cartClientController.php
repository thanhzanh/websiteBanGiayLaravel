<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartClientController extends Controller
{
    // [GET] /cart
    public function index() {
        return view('client.pages.cart.index');
    }

    // [POST] /cart
    public function addPost(Request $request, $id) {
        
        // $productId = $request->product_id;
        
        $user = Auth::user();

        $sessionId = $request->session()->getId();

        // lấy giá sản phẩn từ bảng product
        $product = Product::findOrFail($id);
        $priceNew = $product->price - ($product->price * ($product->discount)/100);

        // Nếu người dùng đã đăng nhập, dùng user_id, nếu không thì dùng session_id
        $cart = Cart::firstOrCreate(
            ['user_id' => $user ? $user->id : null, 'session_id' => $user ? null : $sessionId]
        );

        // Tạo mới CartDetail
        CartItem::create([
            'cart_id' => $cart->cart_id,
            'product_id' => $id,
            'size_id' => $request->size,
            'quantity' => $request->quantity,
            'price' => $priceNew
        ]);

        toastr()->success('Đã thêm sản phẩm vào giỏ hàng');

        return back();

    }
}
