<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\ClientPasswordResetMail;
use App\Models\ClientForgotPassword;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class forgotPasswordClientController extends Controller
{
    public function emailSend()
    {
        return view('client.login.emailSend');
    }

    public function sendResetPassLinkEmail(Request $request)
    {
        $request->validate([
            'user_email' => 'required|exists:users'
        ]);

        $user = User::where('user_email', $request->user_email)->first();

        // dd($admin);

        // Tạo một token reset mật khẩu
        $token = Str::random(40);

        // Lưu token vào bảng client_password_resets
        $data = [
            'user_email' => $request->user_email,
            'token' => $token,
        ];

        if(ClientForgotPassword::create($data)) {
            Mail::to($request->user_email)->send(new ClientPasswordResetMail($user, $token));

            toastr()->success("Gửi email thành công. Vui lòng check email.");

            return redirect()->route('account.login');

        }

        toastr()->error("Gửi email thất bại. Vui lòng kiểm tra lại");
        return redirect()->back();

    }

    public function resetPassword($token)
    {
       
        $tokenData = ClientForgotPassword::where('token', $token)->firstOrFail();

        // dd($tokeData);

        return view('client.login.formResetPassword', compact('token'));
    }

    public function checkResetPassword($token) {
        request()->validate([
            'user_password' => 'required|min:6',
            'password_confirmation' => 'required|same:user_password'
        ]);

        $tokeData = ClientForgotPassword::where('token', $token)->firstOrFail();

        $user = User::where('user_email', $tokeData->user_email)->firstOrFail();

        $data = [
            'user_password' => bcrypt(request('user_password'))
        ];

        $check = $user->update($data);

        if ($check) {
            toastr()->success("Thay đổi mật khẩu thành công!");

            return redirect()->route('account.login');
        }

        toastr()->error("Thay đổi mật khẩu thất bại!");
        
        return redirect()->route('account.login');
    }
}
