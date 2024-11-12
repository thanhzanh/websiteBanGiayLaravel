@extends('admin.layout.layout');

@section('title', 'Danh mục sản phẩm')

@section('content')
<h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Product Category</h1>

<div class="mt-[20px]">
    <h2 class="font-bold italic ">Trạng thái</h2>
    <div>
        <ul class="flex justify-start mt-2">
            <li class="bg-green-400 text-white rounded-xl mr-2 p-2 hover:bg-cyan-500"><a href="">Tất cả</a></li>
            <li class="bg-green-400 text-white rounded-xl mr-2 p-2 hover:bg-cyan-500"><a href="">Hoạt động</a></li>
            <li class="bg-green-400 text-white rounded-xl mr-2 p-2 hover:bg-cyan-500"><a href="">Dừng hoạt động</a></li>
        </ul>
    </div>
</div>

<div class="flex justify-between">
    <div class="mt-[20px]">
        <h2 class="font-bold italic mb-2">Lọc</h2>
        <div>
            <select name="" id="" class="w-72 pt-2 pb-2 outline-none rounded-xl bg-green-400 text-white text-center">
                <option value="" class="selected">-- Lựa chọn --</option>
                <option value="">Giá giảm dần</option>
                <option value="">Giá tăng dần</option>
            </select>
        </div>
    </div>
    <div class="mt-[20px] items-center align-middle">
        <h2 class="font-bold italic mb-6">Thêm sản phẩm mới</h2>
        <a href="{{ route('admin.productCategory.create') }}" title="Thêm" class="p-4 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl ml-16 hover:bg-black"><i class="fa-solid fa-plus"></i></a>
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
        <tbody class="bg-cyan-400">
            <tr class="text-center text-black border-b-2 duration-300">
                <td>1</td>
                <td>MLB</td>
                <td>Hoạt động</td>
                <td>10/11/2024</td>
                <td>10/11/2024</td>
                <td class="h-20">
                    <a href="" title="Sửa" class="p-4 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-eye"></i></a>
                    <a href="" title="Sửa" class="p-4 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="" title="Xóa" class="p-4 bg-red-500 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-minus"></i></a>
                </td>
            </tr>
            <tr class="text-center text-black border-b-2 duration-300">
                <td>2</td>
                <td>NIKE</td>
                <td>Hoạt động</td>
                <td>10/11/2024</td>
                <td>10/11/2024</td>
                <td class="h-20">
                    <a href="" title="Sửa" class="p-4 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-eye"></i></a>
                    <a href="" title="Sửa" class="p-4 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="" title="Xóa" class="p-4 bg-red-500 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-minus"></i></a>
                </td>
            </tr>

        </tbody>
    </table>
</div>

<!-- navigation -->
<nav class="mt-[30px] ">
    <ul class="inline-flex text-xl">
        <li>
            <a href="#" class="flex items-center justify-center px-5 h-12 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
        </li>
        <li>
            <a href="#" class="flex items-center justify-center px-5 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
        </li>
        <li>
            <a href="#" class="flex items-center justify-center px-5 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
        </li>
        <li>
            <a href="#" aria-current="page" class="flex items-center justify-center px-5 h-12 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
        </li>
        <li>
            <a href="#" class="flex items-center justify-center px-5 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
        </li>
        <li>
            <a href="#" class="flex items-center justify-center px-5 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
        </li>
        <li>
            <a href="#" class="flex items-center justify-center px-5 h-12 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
        </li>
    </ul>
</nav>
<!-- end navigation -->

@endsection
