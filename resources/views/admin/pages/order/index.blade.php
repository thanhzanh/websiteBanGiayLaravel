@extends('admin.layout.layout');

@section('title', 'Đơn hàng')

@section('content')
<h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">ORDER</h1>
<div class="search-wrapper mt-5 border-cyan-600 bg-[#f1f5f9] border h-[50px] rounded-[30px] flex items-center overflow-x-hidden">
    <form action="" myethod="get" class="w-full flex">
        <button type="button" id="btn-search" class="inline-block text-[1.6rem] pl-4 pr-4"><i class="fa-solid fa-magnifying-glass"></i></button>
        <input class="h-[100%] w-full bg-[#f1f5f9] border-none outline-none p-[.5rem]" type="search" id="search-product" name="product_name" placeholder="Search here">
    </form>
</div>
<!-- nếu không có kết quả tìm kiếm -->

<div class="mt-[20px] flex align-middle justify-around">
    <h2 class="font-bold italic ">Trạng thái</h2>
    <div class="flex-1 ml-8">
        <button class="rounded-xl px-2 py-2 " type="button">
            Tất cả
        </button>

    </div>
</div>

<div class="mt-[20px] ">
    <h2 class="font-bold italic mb-2">Tất cả đơn hàng</h2>
    <table class="w-full shadow-2xl border-2 border-cyan-200 ">
        <thead class="text-white uppercase">
            <tr class="font-bold text-[1rem] border-b-2">
                <th class="py-3 bg-cyan-700">STT</th>
                <th class="py-3 bg-cyan-700">Mã đơn hàng</th>
                <th class="py-3 bg-cyan-700">Khách hàng</th>
                <th class="py-3 bg-cyan-700">Trạng thái</th>
                <th class="py-3 bg-cyan-700">Ngày tạo</th>
                <th class="py-3 bg-cyan-700">Ngày cập nhật</th>
                <th class="py-3 bg-cyan-700">Hành động</th>
            </tr>
        </thead>
        <tbody class="bg-slate-200">
            @foreach ($orders as $index => $order)
                <tr class="text-center text-black border-b-2 h-[157px] duration-300">
                    <td class="italic">{{ $index+1 }}</td>
                    <td class="w-52 font-bold">{{ $order->code }}</td>
                    @foreach ($users as $user)
                    @if ($order->user_id == $user->user_id)
                        <td class="italic">{{ $user->user_name }}</td>                   
                    @endif
                    @endforeach
                    <td class="italic font-bold">
                        <form action="{{ route('admin.order.updateStatus', ['id' => $order->order_id]) }}" method="post">
                            @csrf
                            <select name="status" class="p-2 outline-none text-blue-700">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : ($order->status == 'delivering' ? 'disabled' : ($order->status == 'completed' ? 'disabled' : '')) }}>Chờ xử lý</option>
                                <option value="delivering" {{ $order->status == 'delivering' ? 'selected' : ($order->status == 'completed' ? 'disabled' : '')}}>Đang giao hàng</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : ($order->status == '')}}>Hoàn thành</option>
                                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : ''}}>Đã hủy</option>
                            </select>
                            <button type="submit">Cập nhật</button>
                        </form>              
                    </td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>
                        <a href="" title="Chi tiết" class="px-3 py-2 bg-blue-700 text-[1rem] font-bold text-white rounded-2xl hover:bg-black"><i class="fa-solid fa-eye"></i></a>
                        <div class="inline-block">
                            <form action="" method="post">
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


<!-- end navigation -->

@endsection