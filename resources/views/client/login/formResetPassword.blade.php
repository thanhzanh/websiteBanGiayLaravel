@extends('client.layouts.default')

@section('title', 'Lấy lại mật khẩu')

@section('content')

<div class="max-w-5xl mx-auto py-12">
    <div class="grid grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">ĐẶT LẠI MẬT KHẨU</h2>
            <form action="{{ route('account.reset-password', ['token' => $token]) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="user_password" class="block text-sm font-bold text-gray-700">Mật khẩu:</label>
                    <input type="password" id="user_password" name="user_password" placeholder="Mật khẩu"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    @if ($errors->has('user_password'))
                        <span class="font-bold italic text-red-500"> {{ $errors->first('user_password') }}</span>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700">Xác nhận mật khẩu:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Xác nhận mật khẩu"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    @if ($errors->has('password_confirmation'))
                        <span class="font-bold italic text-red-500"> {{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <button type="submit" class="bg-black mb-2 text-white px-6 py-2 rounded-md hover:bg-gray-800">ĐẶT LẠI MẬT KHẨU</button>
            </form>
            
        </div>
        
    </div>
</div>
@endsection
