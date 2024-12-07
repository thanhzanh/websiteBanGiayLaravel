@extends('client.layouts.default')

@section('title', 'Trang Chủ')

@section('content')

    <div class="max-w-5xl mx-auto py-12">
        <h2 class="text-2xl font-bold mb-6">ĐĂNG KÝ TÀI KHOẢN</h2>
        <form action="{{ route('account.signup') }}" method="POST"
            class="grid grid-cols-2 gap-6 bg-white p-8 rounded-lg shadow">
            @csrf
            @method('POST')
            <div>
                <label for="user_name" class="block text-sm font-bold text-gray-700">Họ và tên:</label>
                <input type="text" id="user_name" name="user_name" placeholder="Họ và tên"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                @if ($errors->has('user_name'))
                    <span class="font-bold italic text-red-500"> {{ $errors->first('user_name') }}</span>
                @endif
            </div>

            <div>
                <label for="user_email" class="block text-sm font-bold text-gray-700">Email:</label>
                <input type="email" id="user_email" name="user_email" placeholder="Email"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                @if ($errors->has('user_email'))
                    <span class="font-bold italic text-red-500"> {{ $errors->first('user_email') }}</span>
                @endif
            </div>

            <div>
                <label for="user_phone" class="block text-sm font-bold text-gray-700">Số điện thoại:</label>
                <input type="text" id="user_phone" name="user_phone" placeholder="Số điện thoại"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                @if ($errors->has('user_phone'))
                    <span class="font-bold italic text-red-500"> {{ $errors->first('user_phone') }}</span>
                @endif
            </div>

            <div>
                <label for="user_password" class="block text-sm font-bold text-gray-700">Mật khẩu:</label>
                <input type="password" id="user_password" name="user_password" placeholder="Mật khẩu"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                @if ($errors->has('user_password'))
                    <span class="font-bold italic text-red-500"> {{ $errors->first('user_password') }}</span>
                @endif
            </div>
            <div>
                <label for="password" class="block text-sm font-bold text-gray-700">Xác nhận mật khẩu:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Mật khẩu"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                @if ($errors->has('confirm_password'))
                    <span class="font-bold italic text-red-500"> {{ $errors->first('confirm_password') }}</span>
                @endif
            </div>
            <!-- Buttons -->

            <button type="submit" class="bg-black text-white px-2 rounded-md hover:bg-gray-800">ĐĂNG KÝ</button>

            <!-- Social Login -->

        </form>

        <div class="col-span-2 text-center mt-6">
            <p class="leading-[40px]">Hoặc bạn đã có tài khoản</p>
            <a href="{{ route('account.login') }}" type="button"
                class="bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800">ĐĂNG NHẬP</a>
        </div>

        <div class="col-span-2 text-center mt-6">
            <p class="text-sm text-gray-600">Hoặc đăng nhập bằng</p>
            <div class="flex justify-center gap-4 mt-2">
                <button class="bg-red-500 text-white px-4 py-2 rounded-md flex items-center">
                    <span class="mr-2"><i class="fa-brands fa-google-plus-g"></i></span>
                    Google
                </button>
            </div>
        </div>
    </div>
@endsection
