<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
