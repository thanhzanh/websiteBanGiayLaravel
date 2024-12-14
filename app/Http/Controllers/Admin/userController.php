<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
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
}
