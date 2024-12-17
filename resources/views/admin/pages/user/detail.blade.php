@extends('admin.layout.layout');

@section('title', 'Chi tiết tài khoản người dùng')


@section('content')
<h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Chi tiết tài khoản người dùng</h1>
<div class="mt-8">

    @if ($userDetailInfo)

    <p class="mt-4 italic "><strong> Tài khoản: </strong> {{ $userDetailInfo->user_name }}</p>

    <p class="mt-4 italic "><strong> Email: </strong> {{ $userDetailInfo->user_email }}</p>

    <p class="mt-4 italic "><strong> Số điện thoại: </strong> {{ $userDetailInfo->user_phone }}</p>

    <p class="mt-4 italic"><strong>Trạng thái: </strong>
        <?php if ($userDetailInfo->user_status === "active") { ?>
            <button class="p-2 bg-green-500 rounded-xl text-white" type="button">{{$userDetailInfo->user_status}}</button>
        <?php } elseif ($userDetailInfo->user_status === "inactive") { ?>
            <button class="p-2 bg-red-500 rounded-xl text-white" type="button">{{$userDetailInfo->user_status}}</button>
        <?php } ?>
    </p>

    <div class="text-right">
        <a href="{{ route('admin.user.edit', ['user_id' => $userDetailInfo->user_id]) }}" title="Sửa" class="text-right px-3 py-2 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-pen-to-square"></i></a>
    </div>

    @else

    @endif

</div>

@endsection