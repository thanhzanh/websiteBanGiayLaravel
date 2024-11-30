@extends('admin.layout.layout');

@section('title', 'Danh mục sản phẩm')

@section('content')
<h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Product Category</h1>

<div class="search-wrapper mt-5 border-cyan-600 bg-[#f1f5f9] border h-[50px] rounded-[30px] flex items-center overflow-x-hidden">
    <form action="{{ route('admin.productCategory') }}" myethod="get" class="w-full flex">
        <button type="button" id="btn-search" class="inline-block text-[1.6rem] pl-4 pr-4"><i class="fa-solid fa-magnifying-glass"></i></button>
        <input class="h-[100%] w-full bg-[#f1f5f9] border-none outline-none p-[.5rem]" type="search" id="search-product-category" name="product_category_name" placeholder="Search here">
    </form>
</div>
<!-- nếu không có kết quả tìm kiếm -->
@if ($productCategory->isEmpty())
<div class="text-center mt-10">
    <p class="text-red-500 font-bold italic text-xl">Không tìm thấy danh mục sản phẩm. Vui lòng nhập lại!</p>
</div>
@else
<div class="mt-[20px] flex align-middle justify-around">
    <h2 class="font-bold italic ">Trạng thái</h2> <br>
    <div class="flex-1 ml-8">
        @foreach ($listStatus as $item)
        <button class="rounded-xl px-2 py-2 {{ $item['class'] }}" button-status="{{ $item['status'] }}" type="button">
            {{ $item['name'] }}
        </button>
        @endforeach

    </div>
    <div class="mt-[20px] items-center align-middle">
        <a href="{{ route('admin.productCategory.create') }}" title="Thêm" class="py-2 px-4 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl ml-16 hover:bg-black"><i class="fa-solid fa-plus"></i></a>
    </div>
</div>

<div class="mt-[20px] ">
    <h2 class="font-bold italic mb-2">Danh mục sản phẩm</h2>
    <table class="w-full shadow-2xl uppercase border-2 border-cyan-200 ">
        <thead class="text-white">
            <tr class="font-bold text-[1rem] border-b-2">
                <th class="py-3 bg-cyan-700">STT</th>
                <th class="py-3 bg-cyan-700">Tiêu đề</th>
                <th class="py-3 bg-cyan-700">Trạng thái</th>
                <th class="py-3 bg-cyan-700">Ngày tạo</th>
                <th class="py-3 bg-cyan-700">Ngày cập nhật</th>
                <th class="py-3 bg-cyan-700">Hành động</th>
            </tr>
        </thead>
        <tbody class="bg-slate-200">
            @foreach ($productCategory as $index => $item)
            <tr class="text-center text-black border-b-2 duration-300">
                <td>{{($productCategory->perPage()*($productCategory->currentPage() - 1) + ($index+1))}}</td>
                <td>{{$item->product_category_name}}</td>
                <td>
                    <form class="form-change-status" action="{{ route('admin.productCategory.changeStatus',['id' => $item->product_category_id]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <?php if ($item->status === "active") { ?>
                            <button class="button-change-status p-2 bg-green-500 rounded-xl text-white" type="submit">{{$item->status}}</button>
                        <?php } elseif ($item->status === "inactive") { ?>
                            <button data-id="{{ $item->product_category_id }}" data-status="{{ $item->status }}" class="button-change-status p-2 bg-red-500 rounded-xl text-white" type="submit">{{$item->status}}</button>
                        <?php } ?>
                    </form>

                </td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td class="h-20">
                    <a href="{{ route('admin.productCategory.detail', ['id' => $item->product_category_id]) }}" title="Chi tiết" class="px-3 py-2 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('admin.productCategory.edit', ['id' => $item->product_category_id]) }}" title="Sửa" class="px-3 py-2 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-pen-to-square"></i></a>
                    <div class="inline-block">
                        <form action="{{ route('admin.productCategory.delete', ['id' => $item->product_category_id]) }}" method="post">
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
        <li>
            <span class="px-4 py-2 bg-gray-200 text-gray-600 rounded-l-lg">
                {{ $productCategory->previousPageUrl() ? '<' : '' }}
            </span>
        </li>
        @foreach ($productCategory->getUrlRange(1, $productCategory->lastPage()) as $page => $url)
            <li>
                <a href="{{ $url }}" class="px-4 py-2 {{ $productCategory->currentPage() == $page ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }} rounded-md">
                    {{ $page }}
                </a>
            </li>
        @endforeach
        <li>
            <span class="px-4 py-2 bg-gray-200 text-gray-600 rounded-r-lg">
                {{ $productCategory->nextPageUrl() ? '>' : '' }}
            </span>
        </li>
    </ul>
</nav>


<!-- end navigation -->
@endif
@endsection