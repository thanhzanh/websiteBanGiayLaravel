@extends('admin.layout.layout');

@section('title', 'Chi tiết sản phẩm')


@section('content')
<h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Chi tiết danh mục sản phẩm</h1>
<div class="mt-8">

    @if ($productInfo)

    <p class="italic "><strong> Mã sản phẩm: </strong> {{ $productInfo->product_id }}</p>

    <p class="italic mt-4">
        <strong>Tên sản phẩm: </strong>
        <span class="italic text-xl font-bold">         
            {{ $productInfo->product_name }}
         </span>
    </p>

    <p class="italic mt-4"><strong>Slug: </strong> {{ $productInfo->slug }}</p>

    <p class="italic mt-4">
        <strong>Danh mục cha: </strong>
        
            @if ($productCategory)
                {{ $productCategory->product_category_name }}
            @else
                Không có danh mục cha
            @endif
    </p>

    <p class="mt-4 italic"><strong>Mô tả:  <br></strong> {{ $productInfo->description }}</p>

    <p class="mt-4 italic"><strong>Số lượng: </strong> {{ $productInfo->quantity }}</p>

    <p class="mt-4 italic"><strong>Giá: </strong> {{ $productInfo->price }} VNĐ</p>

    <p class="mt-4 italic"><strong>Giảm giá: </strong> {{ $productInfo->discount }} %</p>

    <p class="mt-4 italic"><strong>Trạng thái: </strong>
        <?php if ($productInfo->status === "active") { ?>
            <button class="p-2 bg-green-500 rounded-xl text-white" type="button">{{$productInfo->status}}</button>
        <?php } elseif ($productInfo->status === "inactive") { ?>
            <button class="p-2 bg-red-500 rounded-xl text-white" type="button">{{$productInfo->status}}</button>
        <?php } ?>
    </p>

    <div class="text-right">
        <a href="{{ route('admin.product.edit', ['id' => $productInfo->product_id]) }}" title="Sửa" class="text-right px-3 py-2 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-pen-to-square"></i></a>
    </div>

    @else

    @endif

</div>

@endsection