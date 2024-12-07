@extends('client.layouts.default')

@section('title', 'Trang Chủ')

@section('content')

    <div class="max-w-5xl mx-auto py-12">
        <div class="grid grid-cols-2 gap-8">
            <!-- Login Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">ĐĂNG NHẬP TÀI KHOẢN</h2>
                <form action="{{ route('account.login') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="user_email" class="block text-sm font-bold text-gray-700">Email:</label>
                        <input type="email" id="user_email" name="user_email" placeholder="Email"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        @if ($errors->has('user_email'))
                            <span class="font-bold italic text-red-500"> {{ $errors->first('user_email') }}</span>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="user_password" class="block text-sm font-bold text-gray-700">Mật khẩu:</label>
                        <input type="password" id="user_password" name="user_password" placeholder="Mật khẩu"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        @if ($errors->has('user_password'))
                            <span class="font-bold italic text-red-500"> {{ $errors->first('user_password') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="bg-black mb-2 text-white px-6 py-2 rounded-md hover:bg-gray-800">ĐĂNG
                        NHẬP
                    </button> <br>
                    <a href="#" class="text-sm text-right text-blue-500 hover:underline">Quên mật khẩu?</a>
                </form>
                <!-- Social Login -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">Hoặc đăng nhập bằng</p>
                    <div class="flex justify-center gap-4 mt-2">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-md flex items-center">
                            <span class="mr-2"><i class="fa-brands fa-google-plus-g"></i></span>
                            Google
                        </button>
                    </div>
                </div>
            </div>
            <!-- Register Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4">TẠO TÀI KHOẢN MỚI</h2>
                <p class="text-sm text-gray-700 mb-6">
                    Đăng ký tài khoản ngay để có thể mua hàng nhanh chóng và dễ dàng hơn! Ngoài ra còn có rất nhiều
                    chính sách và ưu đãi cho các thành viên.
                </p>
                <a href="{{ route('account.signup') }}"
                    class="w-full bg-black text-white px-6 py-2 rounded-md hover:bg-gray-800 flex items-center justify-center">
                    <span class="mr-2"><i class="fa-solid fa-user"></i></span> Tạo tài khoản
                </a>
            </div>
        </div>
    </div>
@endsection
