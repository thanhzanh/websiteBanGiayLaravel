@extends('client.layouts.default')

@section('title', 'Lấy lại mật khẩu')

@section('content')

    <div class="py-12">
        <div class="">
            <div class="bg-white p-6">
                <h2 class="text-[18px] mb-4 text-center">Quên mật khẩu? Vui lòng nhập địa chỉ email. Bạn sẽ nhận được một liên kết tạo mật khẩu mới qua email.</h2>
                <form action="forgot-password" method="POST" class="max-w-96 ml-[320px]">
                    @csrf
                    @method('POST')
                    <label for="user_email" class="block text-sm font-bold text-gray-700">Email:</label>
                        <input type="email" id="user_email" name="user_email" placeholder="Email"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        @if ($errors->has('user_email'))
                            <span class="font-bold italic text-red-500"> {{ $errors->first('user_email') }}</span>
                        @endif


                    <button type="submit" class="bg-black mt-4 text-center mb-2 text-white px-6 py-2 rounded-md hover:bg-gray-800">
                        Đặt lại mật khẩu
                    </button> 
                </form>
            </div>

        </div>
    </div>
@endsection
