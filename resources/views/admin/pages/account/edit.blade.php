@extends('admin.layout.layout');

@section('title', 'Chỉnh sửa tài khoản admin')

@section('content')
    <h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Chỉnh sửa tài khoản admin</h1>
    <div class="mt-8">
        <form action="{{ route('admin.account.edit', ['id' => $admins->admin_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mt-6">
                <label class="text-xl font-bold" for="admin_name">Tên tài khoản</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="text"
                    name="admin_name" value="{{ $admins->admin_name }}">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="admin_email">Email *</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="email"
                    name="admin_email" value="{{ $admins->admin_email }}">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="admin_password">Mật khẩu *</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="text"
                    name="admin_password" value="{{ $admins->admin_password }}">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="admin_phone">Số điện thoại</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="number"
                    name="admin_phone" value="{{ $admins->admin_phone }}">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="image_id">Hình ảnh</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" accept="image/*"
                    type="file" name="admin_image">
                <img src="{{ asset('storage/' . $admins->admin_image) }}" alt="{{ $admins->admin_name }}" class="w-[120px] h-[120px] m-2 rounded-lg object-cover border border-gray-200">          
            </div>

            <div class="mt-6">
                <label class="text-xl font-bold" for="admin_desc">Mô tả</label> <br>
                <textarea id="myeditorinstance" rows="5px" cols="150px"
                    class="outline-none border-indigo-300 border mt-4 pl-4 pt-4" name="admin_desc">{{ $admins->admin_desc }}</textarea>
            </div>
            <div class="mt-6">
                <button class="px-6 py-4 bg-blue-600 rounded-xl text-white text-xl font-bold italic hover:bg-slate-500"
                    type="submit">SỬA</button>
            </div>
        </form>
    </div>

@endsection
