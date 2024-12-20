<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Size;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class productController extends Controller
{
    // [GET] /admin/pages/product/index
    public function index(Request $request)
    {
        // tim kiem
        $search = $request->input('product_name');

        // Câu truy vấn
        // lấy ra tất cả sản phẩm quan hệ images=> ds hình ảnh từng sản phẩm
        $productQuery = Product::with(['images' => function ($query) {
            $query->orderBy('created_at', 'asc'); // Lấy hình ảnh sớm nhất cho mỗi sản phẩm
        }]);


        // tim kiem
        if ($search) {
            $productQuery->where('product_name', 'like', '%' . $search . '%');
        }

        // tim kiem san pham
        // thanh trang thai: tat ca, hoat dong, dung hoat dong
        $requestStatus = $request->input('status');

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
                $productQuery->where('status', 'active');
            } elseif ($requestStatus === 'inactive') {
                $productQuery->where('status', 'inactive');
            }
        }

        $products = $productQuery->paginate(6); // tinh nang phan trang ben san pham

        return view('admin.pages.product.index', compact('products', 'search', 'listStatus'));
    }

    // [GET] /admin/pages/product/create
    public function create()
    {
        $categories = ProductCategory::whereNull('parent_id')->with('children')->get(); 

        $sizes = Size::all(); // lấy tất cả size giày

        $products = Product::all(); // lấy tất cả từ model Product để ngoài giao diện đổ ra select

        return view('admin.pages.product.create', compact('products', 'sizes', 'categories'));
    }

    // [POST] /admin/pages/product/create
    public function createPost(Request $request)
    {
        $dataValidated = $request->only([
            'product_name',
            'description',
            'price',
            'quantity',
            'discount',
            'status',
            'featured',
            'product_category_id'
        ]);

        $product = Product::create($dataValidated);

        // Lưu size
        if ($request->has('size_id')) {
            $sizes = $request->input('size_id');
            $product->sizes()->attach($sizes); // sizes() là function quan hệ của product_id và size_id
        }

        // Lưu hình ảnh dưới dạng []
        $images = $request->file('image_id'); // lấy tất cả mảng hình ảnh

        if ($request->hasFile('image_id')) {
            // duyệt qua từng ảnh trong mảng
            foreach ($images as $image) {
                $path = $image->store('images', 'public'); // lưu vào public/images và lấy $path

                // Lưu ảnh vào table image 
                Image::create([
                    'product_id' => $product->product_id, // id sản phẩm
                    'file_image_url' => $path // đường dẫn ảnh
                ]);
            }
        }

        toastr()->success('Thêm sản phẩm thành công!');

        return redirect()->route('admin.product');
    }

    // [GET] /admin/pages/product/detail/{id}
    public function detail($id)
    {
        try {

            // lấy sản phẩm đúng với id gửi lên
            $productInfo = Product::with('images')->find($id);

            // lấy ra danh mục cha để hiển thị
            $productCategory = DB::table('product_category')->where('product_category_id', $productInfo->product_category_id)->first();

            if (!$productInfo) {
                toastr()->error('Sản phẩm không tồn tại!');
            }

            return view('admin.pages.product.detail', compact('productInfo', 'productCategory'));
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.product');
        }
    }

    // [GET] /admin/pages/product/edit/{id}
    public function edit($id)
    {
        try {

            $products = Product::find($id);

            $allSizes = DB::table('size')->get(); // lấy hết size trong table size

            $productSizes = DB::table('product_size')->where('product_id', $id)->pluck('size_id')->toArray(); // gộp size_id lại thành 1 mảng

            // lấy tất cả danh mục cha và con
            $categories = ProductCategory::whereNull('parent_id')->with('children')->get(); 

            // lấy ra tất cả hình ảnh
            $imageProducts = DB::table('image')->where('product_id', $id)->get();

            return view('admin.pages.product.edit', compact('products', 'categories', 'allSizes', 'productSizes', 'imageProducts'));
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.productCategory');
        }
    }

    // [PATCH] /admin/pages/product/edit/{id}
    public function editPatch(Request $request, $id)
    {

        $updateSlug = Str::slug($request->input('product_name')); // update lai slug

        // ======================== update size ===================================
        if ($request->has('size_id')) {
            $product = Product::find($id);

            if ($product) {
                $product->sizes()->sync($request->input('size_id')); // Sử dụng `sync` để tối ưu
            }
        }

        // ======================== update image ===================================
        if ($request->hasFile('image_id')) {
            // Thêm logic kiểm tra khi xử lý ảnh
            try {
                foreach ($request->file('image_id') as $image) {
                    $imagePath = $image->store('images', 'public');
                    DB::table('image')->insert([
                        'product_id' => $id,
                        'file_image_url' => $imagePath,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Lỗi khi cập nhật hình ảnh: ' . $e->getMessage());
                toastr()->error('Cập nhật hình ảnh thất bại!');
            }
        }
        $productUpdated = DB::table('product')->where('product_id', $id)->update([
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'quantity' => $request->input('quantity'),
            'product_category_id' => $request->input('product_category_id'),
            'status' => $request->input('status'),
            'slug' => $updateSlug,
            'featured' => $request->input('featured'),
            'updated_at' => Carbon::now(),
        ]);

        if (!$productUpdated) {
            toastr()->error('Cập nhật sản phẩm thất bại!');
            return redirect()->route('admin.product');
        }

        
        toastr()->success('Đã chỉnh sửa sản phẩm!');

        return redirect()->route('admin.product');
    }


    // [DELETE] /admin/pages/product/delete/{id}
    public function delete($id)
    {
        try {
            // lấy id gửi lên
            $product = Product::find($id);

            if ($product) {

                $product->sizes()->detach(); // detach: xóa size trong bảng product_size

                $product->images()->delete(); // detach: xóa size trong bảng product_size

                $product->delete(); // xóa sản phẩm

                toastr()->success('Đã xóa sản phẩm!');

                return redirect()->route('admin.product');
            } else {
                toastr()->error('Không thể xóa sản phẩm!');
                return redirect()->route('admin.product');
            }
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.product');
        }
    }

    // [PATCH] /admin/pages/product/changeStatus/{id}
    public function changeStatus($id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                toastr()->error('Xảy ra lỗi. Không tìm thấy sản phẩm!');

                return redirect()->route('admin.product');
            }

            $product->status = $product->status === "active" ? "inactive" : "active";

            $product->save();

            toastr()->success('Đã cập nhật trạng thái sản phẩm!');

            // quay lại trang hiện tại
            return redirect()->back();
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.product');
        }
    }
}
