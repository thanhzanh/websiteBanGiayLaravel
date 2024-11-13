<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Support\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

use function Laravel\Prompts\error;
use function Laravel\Prompts\table;

class productCategoryController extends Controller
{
    // [GET] /admin/pages/product-category/index
    public function index()
    {

        // get data from database
        $productCategory = DB::table('product_category')->get();

        return View::make('admin.pages.product-category.index')->with('productCategory', $productCategory);
    }

    // getCategory lấy category cha con
    // public function getCategory($parentID) {
    //     $categorys = ProductCategory::where('product_category_id', $parentID)->where('status', 'active')->get();

    //     foreach($categorys as $category) {
    //         $category->children = $category->getCategory($category->product_category_id);
    //     }

    //     return $category

    // }

    // [GET] /admin/pages/product-category/create
    public function create()
    {


        $categorys = ProductCategory::all(); // lấy tất cả từ model ProductCategory để ngoài giao diện đổ ra select

        return view('admin.pages.product-category.create', compact('categorys'));
    }

    // [POST] /admin/pages/product-category/create
    public function createPost(Request $request)
    {
        try {
            $result = $request->all();

            ProductCategory::create($result);

            toastr()->success('Thêm danh mục sản phẩm thành công!');

            return redirect()->route('admin.productCategory');
        } catch (Exception $exceptions) {
            toastr()->error('Đã có lỗi xảy ra thêm danh mục sản phẩm!');
            Log::error($exceptions->getMessage());
            return back();
        }
    }

    // [GET] /admin/pages/product-category/create/{id}
    public function detail($id)
    {
        try {

            $productCategoryId = strval($id);

            // lấy danh mục đúng với id gửi lên
            $productCategory = DB::table('product_category')->where('product_category_id', $productCategoryId)->first();

            if (!$productCategory) {
                toastr()->error('Danh mục không tồn tại!');
            }

            return view('admin.pages.product-category.detail', compact('productCategory'));
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.productCategory');
        }
    }

    // [GET] /admin/pages/product-category/edit/{id}
    public function edit($id)
    {
        try {
            // ép kiểu id
            $productCategoryId = strval($id);

            // lấy danh mục đúng với id gửi lên
            $productCategory = DB::table('product_category')->where('product_category_id', $productCategoryId)->first();

            if (!$productCategory) {
                toastr()->error('Danh mục không tồn tại!');
            }

            return view('admin.pages.product-category.edit', compact('productCategory'));
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.productCategory');
        }
    }

    // [PATCH] /admin/pages/product-category/edit/{id}
    public function editPatch($id, Request $request)
    {
        try {

            $affected = DB::Table('product_category')->where('product_category_id', $id)->update([
                'product_category_name' => $request->input('product_category_name'),
                'description' => $request->input('description'),
                'parent_id' => $request->input('parent_id'),
                'status' => $request->input('status'),
                'updated_at' => Carbon::now()
            ]);

            toastr()->success('Chỉnh sửa danh mục sản phẩm thành công!');

            return redirect()->route('admin.productCategory');
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.productCategory');
        }
    }

    // [PATCH] /admin/pages/product-category/edit/{id}
    public function delete($id)
    {
        try {
            // lấy id gửi lên
            $productCategory = ProductCategory::find($id);

            if ($productCategory) {
                $productCategory->delete();

                toastr()->success('Xóa danh mục sản phẩm thành công!');

                return redirect()->route('admin.productCategory');

            } else {
                toastr()->error('Không thể xóa danh mục sản phẩm!');
                return redirect()->route('admin.productCategory');
            }
            
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.productCategory');
        }
    }

    // [GET] /admin/pages/product-category/search
    public function search(Request $request)
    {
        $search = $request->input('product_category_name');
        // print_r($search);

        if($search) {
            $results = ProductCategory::where('product_category_name', 'like','%'. $search .'%')->get();
        } else {
            toastr()->error('Không có kết quả mà bạn tìm kiếm!');
            return redirect()->route('admin.productCategory');
        }

        return view('admin.pages.product-category.search', compact('results'));
    }

    // [GET] /admin/pages/product-category/search
    public function changeStatus($id)
    {
        try {
            $productCategory = ProductCategory::find($id);

            if(!$productCategory) {
                toastr()->error('Xảy ra lỗi. Không tìm thấy danh mục!');

                return redirect()->route('admin.productCategory');
            }

            $productCategory->status = $productCategory->status === "active" ? "inactive" : "active";

            $productCategory->save();

            toastr()->success('Đã cập nhật trạng thái danh mục!');

            return redirect()->route('admin.productCategory');
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.productCategory');
        }
    }
}
