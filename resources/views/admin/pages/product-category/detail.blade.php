@extends('admin.layout.layout');

@section('title', 'Chi tiết danh mục sản phẩm')


@section('content')
<h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Chi tiết danh mục sản phẩm</h1>
<div class="mt-8">

    @if ($productCategory)

    <p class="italic "><strong> Mã danh mục: </strong> {{ $productCategory->product_category_id }}</p>

    <p class="italic mt-4"><strong>Danh mục: </strong> {{ $productCategory->product_category_name }}</p>

    <p class="mt-4 italic"><strong>Mô tả: </strong> {{ $productCategory->description }}</p>

    <p class="mt-4 italic"><strong>Trạng thái: </strong>
        <?php if ($productCategory->status === "active") { ?>
            <button class="p-2 bg-green-500 rounded-xl text-white" type="button">{{$productCategory->status}}</button>
        <?php } elseif ($productCategory->status === "inactive") { ?>
            <button class="p-2 bg-red-500 rounded-xl text-white" type="button">{{$productCategory->status}}</button>
        <?php } ?>
    </p>

    @else

    @endif

</div>

@endsection