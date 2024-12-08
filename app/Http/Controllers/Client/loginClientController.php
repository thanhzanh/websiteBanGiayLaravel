<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginClientController extends Controller
{
    // [GET] /account/login
    public function login()
    {
        return view('client.login.index');
    }

    public function signup()
    {
        return view('client.login.signup');
    }

    // [POST] /account/signup
    public function signupPost(Request $request)
    {

        $messages = [
            'user_name.required' => 'Họ và tên là bắt buộc.',
            'user_name.string' => 'Họ và tên phải là một chuỗi ký tự.',
            'user_name.max' => 'Họ và tên không được vượt quá 255 ký tự.',
    
            'user_email.required' => 'Email là bắt buộc.',
            'user_email.email' => 'Email không đúng định dạng.',
            'user_email.regex' => 'Email không được chứa ký tự đặc biệt hoặc dấu.',
    
            'user_password.required' => 'Mật khẩu là bắt buộc.',
            'user_password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự.',
            'user_password.regex' => 'Mật khẩu phải chứa ít nhất 1 ký tự in hoa và 1 chữ số.',

            'confirm_password.required' => 'Xác nhận mật khẩu là bắt buộc.',
            'confirm_password.same' => 'Xác nhận mật khẩu không khớp với mật khẩu.',
    
            'user_phone.required' => 'Số điện thoại là bắt buộc.',
            'user_phone.regex' => 'Số điện thoại phải gồm 10 chữ số.',
        ];

        $validate = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            ],
            'user_password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/', // Tối thiểu 1 ký tự in hoa và 1 số
            ],
            'confirm_password' => 'required|same:user_password',
            'user_phone' => 'required|regex:/^[0-9]{10}$/',
        ], $messages);


        // lưu database
        User::create([
            'user_name' => $request->user_name,
            'user_password' => bcrypt($request->user_password),
            'user_email' => $request->user_email,
            'user_phone' => $request->user_phone
        ]);

        toastr()->success('Đăng ký tài khoản thành công. Mời bạn đăng nhập');

        return redirect()->route('account.login');

    }

    // [POST] /account/signup
    public function loginPost(Request $request) {
        
        $user_email = $request->user_email;
        $user_password = $request->user_password;

        $user = DB::table('users')->where('user_email', $user_email)->first();

        if (!$user) {
            toastr()->error('Email hoặc mật khẩu không chính xác');
            return back()->withInput();
        }

        if (!Hash::check($user_password, $user->user_password)) {
            toastr()->error('Mật khẩu không chính xác');
            return back()->withInput();
        }

        // lưu info vào sesion
        // Lưu thông tin user vào session
        Session::put('infoUser', $user);

        toastr()->success('Đăng nhập thành công!');
        return redirect()->route('home');
    }

    // [GET] /account/logout
    public function logout()
    {
        Session::forget('infoUser');

        // cookie()->forget('laravel_session');

        toastr()->success('Đăng xuất thành công!');

        return redirect()->route('home');
    }

    // [GET] /account/profile
    public function profile()
    {
        $user = DB::table('users')->get();

        
        return view('client.pages.account.profile', compact('user'));
    }

    // [POST] /account/profile
    public function profilePost(Request $request, $id)
    {
        $validatedUser = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users,user_email',
            'user_password' => 'nullable|min:6',  
            'user_phone' => 'nullable|regex:/^[0-9]{10}$/', // sdt phai 10 số
        ]);

        $user = User::findOrFail($id);

        // cap nhat lai mat khau
        if ($request->has('user_password') && !empty($request->admin_password)) {
            $validatedUser['user_password'] = bcrypt($request->user_password);
        } else {
            $validatedUser['user_password'] = $user->user_password; // Giữ nguyên mật khẩu cũ
        }

        $validatedUser['updated_at'] = Carbon::now();

        $user->update($validatedUser);

        session(['infoUser' => $user]); // cập nhật lại session mới để hiện thông tin khi chỉnh sửa

        toastr()->success('Cập nhật tài khoản thành công');

        return back();
        
    }

}
