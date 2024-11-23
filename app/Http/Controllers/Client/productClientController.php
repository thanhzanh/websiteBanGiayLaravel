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
    // public function index()
    // {

    //     return view('client.pages.product.index', ['sp' => Product::all()]);
    // }
    public function index()
    {
        $data = Product::paginate(24); 
        return view('client.pages.product.index', compact('data'));
    }



    // [GET] /product/detail/{id}
    public function detail($id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();
        return view('client.pages.product.detail', compact('product'));
    }


    //[GET] /search
    public function searchProduct(Request $r)
    {
        $tensanpham = $r->tensanpham;
        $data = Product::where('product_name', 'like', "%$tensanpham%")->get();
        return view('client.pages.product.search', ['product' => $data, 'tensanpham' =>  $r->tensanpham]);
    }


    //[GET] /product/brand/{slug}
    public function filterByCategory($id)
    {
        $brands = Product::where('product_category_id', $id)->get();
        return view('client.pages.Filter.brand', compact('brands'));
    }


    //[GET] /products/price/{id}
    public function filterByPrice($min, $max)
    {
        $data = Product::whereBetween('price', [(int)$min * 1000, (int)$max * 1000])->paginate(24);
        return view('client.pages.product.index', compact('data'));
    }


    //[GET] /product/brand/{slug}
    public function filterByFeatured($id)
    {
        $featured = Product::where('featured', $id)->get();
        return view('client.pages.Filter.featured', compact('featured'));
    }

    // public function pagination()
    // {
    //     $data = Product::paginate(24);
    //     return view('client.pages.product.index', compact('data'));
    // }
}
