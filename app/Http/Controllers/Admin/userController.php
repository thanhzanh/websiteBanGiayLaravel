<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class userController extends Controller
{
    public function index() {

        $users = User::all();

        return view('admin.pages.user.index', compact('users'));
    }

    public function detail($user_id) {
        // lấy ra thông tin người dùng theo id gửi lên
        $userDetailInfo = User::find($user_id);

        if (!$user_id) {
            toastr()->error('Tài khoản không tồn tại');
            return back();
        }

        return view('admin.pages.user.detail', compact('userDetailInfo'));
    }

    public function delete($user_id) {
        // lấy ra thông tin người dùng theo id gửi lên
        $userDetailInfo = User::find($user_id);

        if (!$user_id) {
            toastr()->error('Tài khoản không tồn tại');
            return back();
        }

        $userDetailInfo->delete();

        toastr()->success('Đã xóa tài khoản người dùng');

        return back();
    }

    public function changeStatus($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                toastr()->error('Không tìm thấy tài khoản người dùng!');

                return redirect()->route('admin.user.index');
            }

            $user->user_status = $user->user_status === "active" ? "inactive" : "active";

            $user->save();

            toastr()->success('Đã cập nhật trạng thái người dùng!');

            // quay lại trang hiện tại
            return redirect()->back();
        } catch (Exception $exceptions) {
            Log::error($exceptions->getMessage());
            return redirect()->route('admin.user.index');
        }
    }

    public function add() {

        // $users = User::all();

        return view('admin.pages.user.add');
    }

    public function addPost(Request $request) {

        try {

            $validatedUser = $request->validate([
                'user_name' => 'required',
                'user_email' => 'required|email|unique:users,user_email',
                'user_password' => 'required|min:6',  // Tối thiểu 6 ký tự
                'user_phone' => 'nullable|regex:/^[0-9]{10}$/',
                'user_status' => 'required'
            ]);

            // ktra tồn tại email
            $existUser = DB::table('users')->where('user_email', $validatedUser['user_email'])->first();
            if ($existUser) {
                toastr()->error('Email đã tồn tại!');
                return back();
            }
            // mã hóa password khi lưu vào database
            $validatedUser['user_password'] = Hash::make($validatedUser['user_password']);

            // luu vao database
            User::create($validatedUser);

            toastr()->success('Đã thêm tài khoản!');

            return redirect()->route('admin.user.index');
        } catch (Exception $exceptions) {
            toastr()->error('Đã xãy ra lỗi khi tạo tài khoản!');
            Log::error($exceptions->getMessage());
            return back();
        }
    }

    public function edit($user_id) {

        // lay ra admin theo id
        $user = User::find($user_id);

        if (!$user) {
            toastr()->error('Không tìm thấy tài khoản');

            return redirect()->route('admin.user.index');
        }

        $user['user_password'] = '';

        return view('admin.pages.user.edit', compact('user'));
    }

    public function editPatch($user_id, Request $request) {

        $validatedUser = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users,user_email,' . $user_id . ',user_id',
            'user_password' => 'required|min:6',  // Tối thiểu 6 ký tự
            'user_phone' => 'nullable|regex:/^[0-9]{10}$/',
            'user_status' => 'required'
        ]);

        $user = User::find($user_id);

        // Nếu thay đổi mật khẩu và không thay đổi sẽ giữ nguyên
        if ($request->has('user_password') && !empty($request->user_password)) {
            $validatedUser['user_password'] = bcrypt($request->user_password);
        } else {
            $validatedUser['user_password'] = $user->user_password;
        }

        // Cập nhật thời gian sửa đổi
        $validatedUser['updated_at'] = Carbon::now();

        // Cập nhật thông tin admin trong database
        $user->update($validatedUser);

        // Hiển thị thông báo thành công
        toastr()->success('Cập nhật tài khoản thành công!');
        return redirect()->route('admin.user.index');
    }
}
