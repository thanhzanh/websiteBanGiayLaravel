@extends('admin.layout.layout');

@section('title', 'Chỉnh sửa tài khoản người dùng')

@section('content')
    <h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Chỉnh sửa tài khoản
        người dùng
    </h1>
    <div class="mt-8">
        <form action="{{ route('admin.user.edit', ['user_id' => $user->user_id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mt-6">
                <label class="text-xl font-bold" for="">Tên tài khoản</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="text"
                    name="user_name" value="{{ $user->user_name }}">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="">Email *</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="email"
                    name="user_email" value="{{ $user->user_email }}">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="">Mật khẩu *</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="text"
                    name="user_password" value="{{ $user->user_password }}">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="">Số điện thoại</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="number"
                    name="user_phone" value="{{ $user->user_phone }}">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold">Trạng thái</label>
                <div class="mt-4">
                    <input type="radio" name="user_status" id="active" value="active" @checked($user->user_status == 'active')>
                    <label class="text-xl mr-6" for="user_status">Hoạt động</label>
                    <input type="radio" name="user_status" id="inactive" value="inactive" @checked($user->user_status == 'inactive')>
                    <label class="text-xl" for="user_status">Dừng hoạt động</label>
                </div>
            </div>
            <button class="px-6 py-2 mt-4 bg-blue-600 rounded-xl text-white text-xl font-bold italic hover:bg-slate-500"
                type="submit">SỬA</button>
        </form>
    </div>

@endsection
