<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class loginController extends Controller
{
    //
    public function __construct() {}

    public function login()
    {

        return view('admin.login.login');
    }

    // [POST] login
    public function dashboard(Request $request)
    {

        // lây value từ ô input
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $user = DB::table('admin')->where('admin_email', $admin_email)->first();

        if (!$user) {
            toastr()->error('Email hoặc mật khẩu không chính xác');
            return back()->withInput();
        }

        if (!Hash::check($admin_password, $user->admin_password)) {
            toastr()->error('Mật khẩu không chính xác');
            return back()->withInput();
        }

        toastr()->success('Đăng nhập thành công!');
        return redirect()->route('admin.home');
    }

    // [GET] logout
    public function logout(Request $request)
    {

        // xóa token ra khỏi session khi đăng xuất
        Session::forget('admin_token');

        toastr()->success('Đăng xuất thành công!');

        return redirect()->route('admin');
    }
}
