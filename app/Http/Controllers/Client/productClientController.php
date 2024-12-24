<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Size;
use Illuminate\Pagination\Paginator;

class productClientController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProductCategory::all();

        $sort = $request->input('sort', 'best-seller');

        $data = Product::where('status', 'active')->paginate(12);

        return view('client.pages.product.index', compact('sort', 'data', 'categories'));
    }



    // [GET] /product/detail/{id}
    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // lấy ra size giày theo mã sản phẩm
        $sizes = $product->sizes()->get();


        $categories = ProductCategory::all();

        return view('client.pages.product.detail', compact('product', 'sizes', 'categories'));
    }


    //[GET] /search
    public function searchProduct(Request $r)
    {
        $tensanpham = $r->tensanpham;
        $sort = $r->input('sort', 'best-seller');
        $data = Product::where('product_name', 'like', "%$tensanpham%")->get();
        $dta = Product::where('status', 'active')->paginate(12);

        return view('client.pages.product.search', ['product' => $data, 'tensanpham' =>  $r->tensanpham, 'sort' => $sort, 'dta' => $dta]);
    }


    //[GET] /product/brand/{slug}
    public function filterByCategory($slug, Request $r)
    {
        $sort = $r->input('sort', 'best-seller');
        $categories = ProductCategory::all();
        // $data = Product::where('status', 'active')->paginate(12);
        // $brands = Product::where('product_category_id', $slug)->get();
        $brands = Product::where('product_category_id', $slug)->paginate(12);
        $data = $brands;
        return view('client.pages.Filter.brand', compact('brands', 'categories', 'sort', 'data'));
    }


    //[GET] /products/price/{id}
    public function filterByPrice($min, $max, Request $r)
    {
        $sort = $r->input('sort', 'best-seller');
        $categories = ProductCategory::all();
        $data = Product::whereBetween('price', [(int)$min * 1000, (int)$max * 1000])->paginate(12);
        return view('client.pages.product.index', compact('data', 'categories', 'sort'));
    }


    //[GET] /product/brand/{slug}
    public function filterByFeatured($id, Request $r)
    {
        $sort = $r->input('sort', 'best-seller');
        $categories = ProductCategory::all();
        // $featured = Product::where('featured', $id)->get();
        // $data = Product::where('status', 'active')->paginate(12);
        $featured = Product::where('featured', $id)->paginate(12);
        $data = $featured;
        return view('client.pages.Filter.featured', compact('featured', 'sort', 'categories', 'data'));
    }


    public function filterByPriceSort(Request $request)
    {
        $data = Product::paginate(12);

        $sort = $request->input('sort', 'best-seller');

        $products = Product::query();

        $categories = ProductCategory::all();

        switch ($sort) {
            case 'price-asc':
                $products->selectRaw('*, price * (1 - discount / 100) as final_price')
                    ->orderBy('final_price', 'asc');
                break;

            case 'price-desc':
                $products->selectRaw('*, price * (1 - discount / 100) as final_price')
                    ->orderBy('final_price', 'desc');
                break;

            case 'newest':
                $products->orderBy('created_at', 'desc');
                break;

            default:
                $products->orderBy('discount', 'desc');
                break;
        }
        $products = $products->paginate(12);
        return view('client.pages.Filter.sort', compact('data', 'products', 'sort', 'categories'));
    }



    public function getPaginatedProducts(Request $request)
    {
        $products = Product::where('status', 'active')->paginate(12);
        return response()->json($products);
    }

    public function showCategory(Request $request, $id, $slug)
    {
        $category = ProductCategory::findOrFail($id);
        $categories = ProductCategory::all();
        $brands = Product::where('product_category_id', $slug)->get();
        $sort = $request->input('sort', 'best-seller');

        // Truy vấn sản phẩm dựa trên điều kiện
        $query = Product::where('product_category_id', $id)->with('images');

        switch ($sort) {
            case 'price-asc':
                $query->selectRaw('*, price * (1 - discount / 100) as final_price')
                    ->orderBy('final_price', 'asc');
                break;

            case 'price-desc':
                $query->selectRaw('*, price * (1 - discount / 100) as final_price')
                    ->orderBy('final_price', 'desc');
                break;

            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;

            default:
                $query->orderBy('discount', 'desc');
                break;
        }

        // Lấy dữ liệu sản phẩm sau khi sắp xếp
        $products = $query->paginate(12);

        return view('client.pages.Filter.brand', compact('products', 'categories', 'category', 'sort', 'brand'));
    }
}
