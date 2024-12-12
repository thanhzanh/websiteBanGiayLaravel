@extends('client.layouts.default')

@section('title', 'Hồ sơ của tôi')

@section('content')

    <div class="max-w-5xl mx-auto py-12">
        <h2 class="text-xl font-bold mb-6 uppercase text-gray-500 bg-slate-100 pt-2 pb-2 pl-2">Hồ sơ của tôi</h2>
        <form action="{{ route('account.profile.update', ['id' => session('infoUser')->user_id]) }}" method="POST" class="grid grid-cols-2 gap-6 bg-white p-8 rounded-lg shadow">
            @csrf
            @method('PUT')
            @if (session('infoUser'))
                <div>
                    <label for="user_name" class="block text-sm font-bold text-gray-700">Họ và tên</label>
                    <input type="text" id="user_name" name="user_name" placeholder="Họ và tên"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ session('infoUser')->user_name }}">
                </div>

                <div>
                    <label for="user_email" class="block text-sm font-bold text-gray-700">Email</label>
                    <input type="email" id="user_email" name="user_email" placeholder="Email"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ session('infoUser')->user_email }}">
                </div>

                <div>
                    <label for="user_phone" class="block text-sm font-bold text-gray-700">Số điện thoại</label>
                    <input type="text" id="user_phone" name="user_phone" placeholder="Số điện thoại"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2" value="{{ session('infoUser')->user_phone }}">
                </div>

                <div>
                    <label for="user_password" class="block text-sm font-bold text-gray-700">Mật khẩu</label>
                    <input type="password" id="user_password" name="user_password" placeholder="Mật khẩu"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <br>
            @endif

            <button type="submit" class="bg-black py-2 text-white px-2 rounded-md hover:bg-gray-800">LƯU</button>

        </form>
    </div>
@endsection
