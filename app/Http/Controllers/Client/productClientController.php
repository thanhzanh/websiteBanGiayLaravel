<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Pagination\Paginator;

class productClientController extends Controller
{

    // [GET] /product
    public function index()
    {
        $data = Product::paginate(24);
        Paginator::useBootstrap();
        return view('client.pages.product.index', ['sp' => Product::all(), 'data' => $data]);
    }




    // [GET] /product/detail/{id}
    public function detail($id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();
        return view('client.pages.product.detail', compact('product'));
    }


    public function filterByCategory($id)
    {
        // Lấy danh sách sản phẩm theo product_category_id
        // $products = Product::where('product_category_id', $id)->get();

        // Lấy thông tin của danh mục hiện tại (nếu có model ProductCategory)
        // $currentCategory = ProductCategory::find($id);

        $brands = Product::where('product_category_id', $id)->get();

        // Trả về view với dữ liệu
        return view('client.pages.brand.index', compact('brands'));
    }




    //[GET] /search
    public function searchProduct(Request $r)
    {
        $tensanpham = $r->tensanpham;
        $data = Product::where('product_name', 'like', "%$tensanpham%")->get();
        return view('client.pages.product.search', ['product' => $data, 'tensanpham' =>  $r->tensanpham]);
    }
}
