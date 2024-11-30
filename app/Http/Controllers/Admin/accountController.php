<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class accountController extends Controller
{
    // [GET] /admin/pages/account/index
    public function index(Request $request)
    {
        $accounts = Admin::all();
        return view('admin.pages.account.accountAdmin', compact('accounts'));
    }

    // [GET] /admin/pages/account/create
    public function create()
    {

        return view('admin.pages.account.create');
    }

    // [POST] /admin/pages/account/create
    public function createPost(Request $request)
    {
        try {

            $validatedAdmin = $request->validate([
                'admin_name' => 'required',
                'admin_email' => 'required|email|unique:admin,admin_email',
                'admin_password' => 'required|min:6',  // Tối thiểu 6 ký tự
                'admin_phone' => 'nullable|regex:/^[0-9]{10}$/',
                'admin_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'admin_desc' => 'nullable'
            ]);

            // ktra tồn tại email
            $existAdmin = DB::table('admin')->where('admin_email', $validatedAdmin['admin_email'])->first();
            if ($existAdmin) {
                toastr()->error('Email đã tồn tại!');
                return back();
            }
            // mã hóa password khi lưu vào database
            $validatedAdmin['admin_password'] = Hash::make($validatedAdmin['admin_password']);

            // lưu hình ảnh
            if ($request->hasFile('admin_image')) {
                // Lưu hình ảnh và lấy đường dẫn lưu trữ
                $imagePath = $request->file('admin_image')->store('admin', 'public');
                $validatedAdmin['admin_image'] = $imagePath;
            }

            Admin::create($validatedAdmin);

            toastr()->success('Đã thêm tài khoản!');

            return redirect()->route('admin.account');
        } catch (Exception $exceptions) {
            toastr()->error('Đã xãy ra lỗi khi tạo tài khoản!');
            Log::error($exceptions->getMessage());
            return back();
        }
    }

    // [GET] /admin/pages/account/detail
    public function detail($id)
    {
        try {

            // lấy sản phẩm đúng với id gửi lên
            $accountInfo = Admin::find($id);

            if (!$accountInfo) {
                toastr()->error('Không tồn tại tài khoản');
            }

            return view('admin.pages.account.detail', compact('accountInfo'));
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());
            return back();
        }
    }

    // [GET] /admin/pages/account/create
    public function edit($id)
    {
        try {

            // lay ra admin theo id
            $admins = Admin::find($id);

            $admins['admin_password'] = '';

            return view('admin.pages.account.edit', compact('admins'));
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.pages.account');
        }
    }

    public function editPost(Request $request, $id)
    {
        $validatedAdmin = $request->validate([
            'admin_name' => 'required',
            'admin_email' => 'required|email|unique:admin,admin_email,' . $id . ',admin_id',  // Sử dụng unique và bỏ qua bản ghi hiện tại
            'admin_password' => 'nullable|min:6',  
            'admin_phone' => 'nullable|regex:/^[0-9]{10}$/',
            'admin_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra hình ảnh mới
            'admin_desc' => 'nullable'
        ]);
        

        $admin = Admin::find($id);

        // Nếu thay đổi mật khẩu và không thay đổi sẽ giữ nguyên
        if ($request->has('admin_password') && !empty($request->admin_password)) {
            $validatedAdmin['admin_password'] = bcrypt($request->admin_password);
        } else {
            $validatedAdmin['admin_password'] = $admin->admin_password;
        }

        if ($request->hasFile('admin_image')) {
            // Lưu hình ảnh mới vào thư mục public
            $imagePath = $request->file('admin_image')->store('admin', 'public');
            $validatedAdmin['admin_image'] = $imagePath;

            // Xóa hình ảnh cũ nếu có
            if ($admin->admin_image) {
                Storage::delete('public/' . $admin->admin_image);  // Xóa hình cũ trong thư mục public
            }
        }

        // Cập nhật thời gian sửa đổi
        $validatedAdmin['updated_at'] = Carbon::now();

        // Cập nhật thông tin admin trong database
        $admin->update($validatedAdmin);

        // Hiển thị thông báo thành công
        toastr()->success('Cập nhật tài khoản thành công!');
        return redirect()->route('admin.account');
    }



    // [DELETE] /admin/pages/account/delete/{id}
    public function delete($id)
    {
        try {
            // lấy id gửi lên
            $admin = Admin::find($id);

            if ($admin) {

                $admin->delete();

                toastr()->success('Đã xóa tài khoản!');

                return redirect()->route('admin.account');
            } else {
                toastr()->error('Không thể xóa tài khoản!');
                return redirect()->route('admin.account');
            }
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());

            return redirect()->route('admin.account');
        }
    }
}
