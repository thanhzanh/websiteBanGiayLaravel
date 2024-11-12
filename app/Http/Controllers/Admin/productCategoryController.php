<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exceptions\InvalidOrderException;
use Illuminate\Support\Facades\Log;

class productCategoryController extends Controller
{
    // [GET] /admin/pages/product-category/index
    public function index() {
        return view('admin.pages.product-category.index');
    }

     // [GET] /admin/pages/product-category/create
    public function create() {
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
