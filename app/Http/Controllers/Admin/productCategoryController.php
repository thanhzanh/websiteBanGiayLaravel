<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exceptions\InvalidOrderException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class productCategoryController extends Controller
{
    // [GET] /admin/pages/product-category/index
    public function index() {

        // get data from database
        $productCategory = DB::table('product_category')->get();
        // print_r($category);

        // return View('admin.pages.product-category.index',compact('productCategory', $productCategory));
        return View::make('admin.pages.product-category.index')->with('productCategory', $productCategory);
    }

     // [GET] /admin/pages/product-category/create
    public function create(Request $request) {

        return view('admin.pages.product-category.create');
    }

     // [POST] /admin/pages/product-category/create
     public function createPost(Request $request) {
        try {
            $result = $request->all();
    
            ProductCategory::create($result);

            toastr()->success('Thêm danh mục sản phẩm thành công!');

            return redirect()->route('admin.productCategory');
        } catch (Exception $exceptions) {
            toastr()->success('Đã có lỗi xảy ra thêm danh mục sản phẩm!');
            Log::error($exceptions->getMessage());
            return back();
        }
        
    }
}
