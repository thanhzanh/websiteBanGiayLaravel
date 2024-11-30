@extends('admin.layout.layout');

@section('title', 'Chi tiết tài khoản')


@section('content')
<h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Chi tiết tài khoản</h1>
<div class="mt-8">

    @if ($accountInfo)

    <p class="mt-4 italic "><strong> Tài khoản: </strong> {{ $accountInfo->admin_name }}</p>

    <p class="mt-4 italic "><strong> Email: </strong> {{ $accountInfo->admin_email }}</p>

    <p class="mt-4 italic "><strong> Số điện thoại: </strong> {{ $accountInfo->admin_phone }}</p>

    <p class="mt-4 italic"><strong>Mô tả: <br></strong> {{ $accountInfo->admin_desc }}</p>

    <div class="mt-4 flex flex-wrap">
        <p class="mb-2 mr-4"><strong>Avatar: </strong></p>
        <img src="{{ asset('storage/' . $accountInfo->admin_image) }}" alt="{{ $accountInfo->admin_image }}" class="w-56 h-56 m-2 rounded-lg object-cover border border-gray-200">          
    </div>

    <div class="text-right">
        <a href="" title="Sửa" class="text-right px-3 py-2 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-pen-to-square"></i></a>
    </div>

    @else

    @endif

</div>

@endsection