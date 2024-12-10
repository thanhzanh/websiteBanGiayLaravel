<?php

namespace App\Http\Controllers\Admin;

use App\Mail\PasswordResetMail;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\ForgotPassword;
use Illuminate\Http\Request;

class forgotPasswordController extends Controller
{
    public function emailSend()
    {
        return view('admin.login.emailSend');
    }

    public function sendResetPassLinkEmail(Request $request)
    {
        $request->validate([
            'admin_email' => 'required|exists:admin'
        ]);

        $admin = Admin::where('admin_email', $request->admin_email)->first();

        // dd($admin);

        // Tạo một token reset mật khẩu
        $token = Str::random(40);

        // Lưu token vào bảng forgot_password
        $data = [
            'admin_email' => $request->admin_email,
            'token' => $token,
        ];

        if(ForgotPassword::create($data)) {
            Mail::to($request->admin_email)->send(new PasswordResetMail($admin, $token));

            toastr()->success("Gửi email thành công. Vui lòng check email.");

            return redirect()->route('admin');

        }

        toastr()->error("Gửi email thất bại. Vui lòng kiểm tra lại");
        return redirect()->back();

    }

    public function resetPassword($token)
    {
       
        $tokeData = ForgotPassword::where('token', $token)->firstOrFail();

        // dd($admin);

        return view('admin.login.formResetPassword')->with('token', $tokeData);
    }

    public function checkResetPassword($token) {
        request()->validate([
            'admin_password' => 'required|min:6',
            'password_confirmation' => 'required|same:admin_password'
        ]);

        $tokeData = ForgotPassword::where('token', $token)->firstOrFail();

        $admin = Admin::where('admin_email', $tokeData->admin_email)->firstOrFail();

        $data = [
            'admin_password' => bcrypt(request('admin_password'))
        ];

        $check = $admin->update($data);

        if ($check) {
            toastr()->success("Thay đổi mật khẩu thành công!");

            return redirect()->route('admin');
        }

        toastr()->error("Thay đổi mật khẩu thất bại!");
        
        return redirect()->route('admin');
    }
}
