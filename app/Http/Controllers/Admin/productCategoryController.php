<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

use function Laravel\Prompts\error;

class productCategoryController extends Controller
{
    // [GET] /admin/pages/product-category/index
    public function index() {

        // get data from database
        $productCategory = DB::table('product_category')->get();

        return View::make('admin.pages.product-category.index')->with('productCategory', $productCategory);
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

    // [GET] /admin/pages/product-category/create
    public function detail($id) {

        try {

            $productCategoryId = strval($id);

            // lấy danh mục đúng với id gửi lên
            $productCategory = DB::table('product_category')->where('product_category_id', $productCategoryId)->first();

            if(!$productCategory) {
                toastr()->error('Danh mục không tồn tại!');
            }

            return view('admin.pages.product-category.detail', compact('productCategory'));
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.productCategory');
        }
    
    }
}
