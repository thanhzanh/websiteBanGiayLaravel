@extends('admin.layout.layout');

@section('title', 'Chi tiết đơn hàng')

@section('content')
<h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center mb-2">CHI TIẾT ĐƠN HÀNG</h1>

<div class="max-w-[1280px] mx-auto pr-6 pl-6 pb-6 mb-8">
    @if ($order)
        <div class="bg-white shadow rounded-lg mt-10">
            <div class="flex justify-between border">
                <p class="pr-4 pt-4 pb-2 pl-6">Mã đơn hàng: <span class="text-[18px] font-bold">{{ $order->code }}</span>
                </p>
                @if ($order->status == 'pending')
                    <h1 class="pr-4 pt-4 pb-2 text-[18px] text-red-600 font-bold uppercase">Chờ xử lý</h1>
                @elseif ($order->status == 'delivering')
                    <h1 class="pr-4 pt-4 pb-2 text-[18px] text-red-600 font-bold uppercase">Đang giao hàng</h1>
                @elseif ($order->status == 'completed')
                    <h1 class="pr-4 pt-4 pb-2 text-[18px] text-red-600 font-bold uppercase">Hoàn thành</h1>
                @endif

            </div>
            <div class="border-dashed border-2 border-indigo-400 pt-4 mb-6 pl-6 pb-6">
                <h2 class="text-[18px]">Địa chỉ giao hàng:</h2>
                <p>{{ $userAddress->receiver_name }}</p>
                <span>{{ $userAddress->receiver_phone }}</span>
                <span>|</span>
                <span>{{ $userAddress->address }}</span>
            </div>

            <div class="flex border-b mt-6 mb-6 pt-6 pb-6">
                @foreach ($orderItem as $item)
                    @foreach ($products as $product)
                        @if ($product->product_id == $item->product_id)
                            <div class="w-[120px] h-[120px] mr-8 border ml-6">
                                <a href="{{ route('order.detail', ['id' => $order->order_id]) }}">
                                    <img class="w-auto"
                                        src="{{ asset('storage/' . $product->images->first()->file_image_url) }}"
                                        alt="{{ $product->product_name }}" class="w-auto h-40 object-cover">
                                </a>
                            </div>
                            <div class="block flex-1 ">
                                <span class="text-[16px]">{{ $product->product_name }}</span> <br>
                                <span class="font-bold">x{{ $item->quantity }}</span>
                            </div>

                            <div class="pr-6 text-[16px]">
                                <span
                                    class="italic font-bold text-red-600">{{ number_format($item->price, 0, ',', '.') }}
                                    đ</span>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
            <div class="flex justify-between pb-2 pr-4 text-[16px]">
                <div class="pl-6">
                    <p>Ngày đặt hàng: {{ $order->created_at }}</p>
                </div>
                <div>
                    <span class="text-[18px]">Thành tiền: </span>
                    <span class="italic font-bold text-red-600 text-[22px]">
                        {{ number_format($item->total, 0, ',', '.') }}đ</span>
                </div>
            </div>
            <div class="flex pb-4 pr-4 text-[16px]">
                <div class="pl-6">
                    <p>Phương thức thanh toán:</p>
                </div>
                <div>
                    <span class="text-[16px] pl-2">
                        {{ $transaction->payment_method == 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng' }}
                    </span>
                </div>
            </div>
        </div>
    @else
    @endif

</div>

<!-- navigation -->

<!-- end navigation -->

@endsection