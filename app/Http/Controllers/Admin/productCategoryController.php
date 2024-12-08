<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Support\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

use function Laravel\Prompts\error;
use function Laravel\Prompts\table;

class productCategoryController extends Controller
{
    // [GET] /admin/pages/product-category/index
    public function index(Request $request)
    {

        $search = $request->input('product_category_name');
        // thanh trang thai: tat ca, hoat dong, dung hoat dong
        $requestStatus = $request->input('status');

        // Câu truy vấn
        $productCategoryQuery = DB::table('product_category');

        // tim kiem
        if ($search) {
            $productCategoryQuery->where('product_category_name', 'like', '%' . $search . '%');
        }

        $listStatus = [
            [
                'name' => 'Tất cả',
                'status' => '',
                'class' => ''
            ],
            [
                'name' => 'Đang hoạt động',
                'status' => 'active',
                'class' => ''
            ],
            [
                'name' => 'Ngừng hoạt động',
                'status' => 'inactive',
                'class' => ''
            ],
        ];

        foreach ($listStatus as &$item) {
            if ($requestStatus === "" || $requestStatus == null) {
                if ($item['status'] === "") {
                    $item['class'] = "font-bold italic bg-green-500 text-white";
                }
            } elseif ($item['status'] === $requestStatus) {
                $item['class'] = "font-bold italic bg-green-500 text-white";
            }
        }

        unset($item); // xoa tham chieu tranh loi sau vong lap


        if ($requestStatus) {
            if ($requestStatus === 'active') {
                $productCategoryQuery->where('status', 'active');
            } elseif ($requestStatus === 'inactive') {
                $productCategoryQuery->where('status', 'inactive');
            }
        }

        $products = DB::table('product')->get();

        // get data from database
        $productCategory = $productCategoryQuery->paginate(4);

        return View::make('admin.pages.product-category.index')->with('productCategory', $productCategory)->with('listStatus', $listStatus)->with('search', $search)->with('products', $products);
    }

    // [GET] /admin/pages/product-category/create
    public function create()
    {

        // Lấy tất cả danh mục cha và danh mục con
        $categories = ProductCategory::whereNull('parent_id')->with('children')->get();  // `with('children')` sẽ giúp tải danh mục con

        return view('admin.pages.product-category.create', compact('categories'));
    }

    // [POST] /admin/pages/product-category/create
    public function createPost(Request $request)
    {
        try {
            // lấy tất cả thông tin tạo gửi lên
            $result = $request->all();

            // tạo lưu vào database
            ProductCategory::create($result);

            toastr()->success('Thêm danh mục sản phẩm thành công!');

            return redirect()->route('admin.productCategory');
        } catch (Exception $exceptions) {
            toastr()->error('Đã xãy ra lỗi khi tạo danh mục!');
            Log::error($exceptions->getMessage());
            return back();
        }
    }

    // [GET] /admin/pages/product-category/create/{id}
    public function detail($id)
    {
        try {

            // lấy danh mục đúng với id gửi lên
            $productCategory = ProductCategory::find($id);
            // $productCategory = DB::table('product_category')->where('product_category_id', $productCategoryId)->first();

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

            // lay ra danh muc dung voi id gui len
            $categorys = ProductCategory::find($id);

            // lấy tat ca danh mục 
            $allCategorys = DB::table('product_category')->get();

            return view('admin.pages.product-category.edit', compact('allCategorys', 'categorys'));
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

    // [DELETE] /admin/pages/product/delete/{id}
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

    // [GET] /admin/pages/product-category/changeStatus/{id}
    public function changeStatus($id)
    {
        try {
            $productCategory = ProductCategory::find($id);

            if (!$productCategory) {
                toastr()->error('Xảy ra lỗi. Không tìm thấy danh mục!');

                return redirect()->route('admin.productCategory');
            }

            $productCategory->status = $productCategory->status === "active" ? "inactive" : "active";

            $productCategory->save();

            toastr()->success('Đã cập nhật trạng thái danh mục!');

            // quay lại trang hiện tại
            return redirect()->back();
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.productCategory');
        }
    }
}
