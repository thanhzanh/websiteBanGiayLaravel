@extends('admin.layout.layout');

@section('title', 'Thêm tài khoản')

@section('content')
    <h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Thêm tài khoản admin
    </h1>
    <div class="mt-8">
        <form action="{{ route('admin.account.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mt-6">
                <label class="text-xl font-bold" for="">Tên tài khoản</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="text"
                    name="admin_name">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="">Email *</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="email"
                    name="admin_email">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="">Mật khẩu *</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="text"
                    name="admin_password">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="">Số điện thoại</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="number"
                    name="admin_phone">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="image_id">Hình ảnh</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" accept="image/*"
                    type="file" name="admin_image">
            </div>

            <div class="mt-6">
                <label class="text-xl font-bold" for="">Mô tả</label> <br>
                <textarea id="myeditorinstance" rows="5px" cols="150px"
                    class="outline-none border-indigo-300 border mt-4 pl-4 pt-4" name="admin_desc"></textarea>
            </div>
            <div class="mt-6">
                <button class="px-6 py-4 bg-blue-600 rounded-xl text-white text-xl font-bold italic hover:bg-slate-500"
                    type="submit">THÊM</button>
            </div>
        </form>
    </div>

@endsection
