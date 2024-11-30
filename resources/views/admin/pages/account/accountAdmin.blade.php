@extends('admin.layout.layout');

@section('title', 'Tài khoản admin')

@section('content')
    <h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Account</h1>

    <div
        class="search-wrapper mt-5 border-cyan-600 bg-[#f1f5f9] border h-[50px] rounded-[30px] flex items-center overflow-x-hidden">
        <form action="" myethod="get" class="w-full flex">
            <button type="button" id="btn-search" class="inline-block text-[1.6rem] pl-4 pr-4"><i
                    class="fa-solid fa-magnifying-glass"></i></button>
            <input class="h-[100%] w-full bg-[#f1f5f9] border-none outline-none p-[.5rem]" type="search"
                id="search-product-category" name="product_category_name" placeholder="Search here">
        </form>
    </div>

    <div class="mt-[20px] flex align-middle justify-end">
        <div class="mt-[20px] items-center align-middle">
            <a href="{{ route('admin.account.create') }}" title="Thêm"
                class="py-2 px-4 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl ml-16 hover:bg-black"><i
                    class="fa-solid fa-plus"></i></a>
        </div>
    </div>

    <div class="mt-[20px] ">
        <h2 class="font-bold italic mb-2">Tài khoản admin</h2>
        <table class="w-full shadow-2xl border-2 border-cyan-200 ">
            <thead class="text-white">
                <tr class="font-bold text-[1rem] border-b-2">
                    <th class="py-3 bg-cyan-700">STT</th>
                    <th class="py-3 bg-cyan-700">Tên</th>
                    <th class="py-3 bg-cyan-700">Hình ảnh</th>
                    <th class="py-3 bg-cyan-700">Email</th>
                    <th class="py-3 bg-cyan-700">Ngày tạo</th>
                    <th class="py-3 bg-cyan-700">Ngày cập nhật</th>
                    <th class="py-3 bg-cyan-700">Hành động</th>
                </tr>
            </thead>
            <tbody class="bg-slate-200">
                
                @foreach ($accounts as $index => $item)
                    <tr class="text-center text-black border-b-2 duration-300">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->admin_name }}</td>
                        <td class="">
                            <img src="{{ asset('storage/' . $item->admin_image) }}" alt="{{ $item->admin_name }}" class="w-[120px] h-[120px] m-2 rounded-lg">

                        </td>
                        <td>{{ $item->admin_email }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td class="h-20">
                            <a href="{{ route('admin.account.detail', ['id' => $item->admin_id]) }}" title="Chi tiết"
                                class="px-3 py-2 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.account.edit', ['id' => $item->admin_id]) }}" title="Sửa"
                                class="px-3 py-2 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <div class="inline-block">
                                <form action="{{ route('admin.account.delete', ['id' => $item->admin_id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Xóa"
                                        class="px-3 py-[0.68rem] bg-red-500 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i
                                            class="fa-solid fa-minus"></i></button>
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
        </ul>
    </nav>

    <!-- end navigation -->
@endsection
