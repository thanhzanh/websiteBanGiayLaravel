@extends('admin.layout.layout');

@section('title', 'Sản phẩm')

@section('content')
<h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Product</h1>
<div class="search-wrapper mt-5 border-cyan-600 bg-[#f1f5f9] border h-[50px] rounded-[30px] flex items-center overflow-x-hidden">
    <form action="{{ route('admin.product') }}" myethod="get" class="w-full flex">
        <button type="button" id="btn-search" class="inline-block text-[1.6rem] pl-4 pr-4"><i class="fa-solid fa-magnifying-glass"></i></button>
        <input class="h-[100%] w-full bg-[#f1f5f9] border-none outline-none p-[.5rem]" type="search" id="search-product" name="product_name" placeholder="Search here">
    </form>
</div>
<!-- nếu không có kết quả tìm kiếm -->
@if ($products->isEmpty())
<div class="text-center mt-10">
    <p class="text-red-500 font-bold italic text-xl">Không tìm thấy sản phẩm. Vui lòng nhập lại!</p>
</div>
@else
<div class="mt-[20px] flex align-middle justify-around">
    <h2 class="font-bold italic ">Trạng thái</h2>
    <div class="flex-1 ml-8">
        @foreach ($listStatus as $item)
        <button class="rounded-xl px-2 py-2 {{ $item['class'] }}" button-status="{{ $item['status'] }}" type="button">
            {{ $item['name'] }}
        </button>
        @endforeach

    </div>
    <div class="mt-[20px] items-center align-middle">
        <h2 class="font-bold italic mb-6">Thêm mới sản phẩm</h2>
        <a href="{{ route('admin.product.create') }}" title="Thêm" class="py-2 px-4 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl ml-16 hover:bg-black"><i class="fa-solid fa-plus"></i></a>
    </div>
</div>

<div class="mt-[20px] ">
    <h2 class="font-bold italic mb-2">Danh sách sản phẩm</h2>
    <table class="w-full shadow-2xl border-2 border-cyan-200 ">
        <thead class="text-white uppercase">
            <tr class="font-bold text-[1rem] border-b-2">
                <th class="py-3 bg-cyan-700">STT</th>
                <th class="py-3 bg-cyan-700">Tên sản phẩm</th>
                <th class="py-3 bg-cyan-700">Hình ảnh</th>
                <th class="py-3 bg-cyan-700">Số lượng</th>
                <th class="py-3 bg-cyan-700">Giá</th>
                <th class="py-3 bg-cyan-700">Trạng thái</th>
                <th class="py-3 bg-cyan-700">Ngày tạo</th>
                <th class="py-3 bg-cyan-700">Ngày cập nhật</th>
                <th class="py-3 bg-cyan-700">Hành động</th>
            </tr>
        </thead>
        <tbody class="bg-slate-200">
            @foreach ($products as $index => $product)
            <tr class="text-center text-black border-b-2 h-[157px] duration-300">
                <td class="font-bold italic">{{($products->perPage()*($products->currentPage() - 1) + ($index+1))}}</td>
                <td class="w-52 font-bold">{{ $product->product_name }}</td>
                <td class="items-center align-middle pt-2 pb-2 w-40">
                    <!-- Kiểm tra sản phẩm có hình ảnh hay không -->
                    @if ($product->images->isNotEmpty())
                    <img src="{{ asset('storage/' . $product->images->first()->file_image_url) }}" alt="{{ $product->product_name }}" class="w-32 h-32 object-cover">
                    @endif
                </td>
                <td>
                    <input type="number" name="quantity" min="1" value="{{ $product->quantity }}" class="text-center text-xl w-[70px]">
                </td>
                <td class="italic font-bold">{{ number_format( $product->price, 0 ,'0', '.' ) }} <strong class="italic">VNĐ</strong></td>
                <td>
                    <form class="form-change-status" action="{{ route('admin.product.changeStatus',['id' => $product->product_id]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <?php if ($product->status === "active") { ?>
                            <button class="button-change-status p-2 bg-green-500 rounded-xl text-white" type="submit">{{$product->status}}</button>
                        <?php } elseif ($product->status === "inactive") { ?>
                            <button data-id="{{ $product->product_id }}" data-status="{{ $product->status }}" class="button-change-status p-2 bg-red-500 rounded-xl text-white" type="submit">{{$product->status}}</button>
                        <?php } ?>
                    </form>
                </td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.product.detail', ['id' => $product->product_id]) }}" title="Chi tiết" class="px-3 py-2 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('admin.product.edit', ['id' => $product->product_id]) }}" title="Sửa" class="px-3 py-2 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-pen-to-square"></i></a>
                    <div class="inline-block">
                        <form action="{{ route('admin.product.delete', ['id' => $product->product_id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button title="Xóa" class="px-3 py-[0.68rem] bg-red-500 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-minus"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- navigation -->
<nav class="mt-[30px]">
    <ul class="inline-flex text-xl font-bold italic">
        {{ $products->appends(['product_name' => $search, 'status' => request('status')])->links() }}
    </ul>
</nav>

<!-- end navigation -->
@endif

@endsection