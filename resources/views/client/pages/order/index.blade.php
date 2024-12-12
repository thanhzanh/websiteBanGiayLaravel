@extends('client.layouts.default')

@section('title', 'Đơn hàng của tôi')

@section('content')

    <div class="max-w-[1280px] mx-auto p-6 mt-8 mb-8">
        @if ($orders)
            <h2 class="text-xl font-bold mb-6 uppercase text-gray-500 bg-slate-100 pt-2 pb-2 pl-2"> Đơn hàng của tôi</h2>
            @foreach ($orderItems as $order)
                <div class="bg-white shadow rounded-lg mt-10">
                    <div class="flex justify-between mt-4 mb-4 border">

                        <p class="pr-4 pt-4 pb-2 pl-6">Mã đơn hàng: <span
                                class="text-[18px] font-bold">{{ $order->code }}</span></p>
                        @if ($order->status == 'pending')
                            <h1 class="pr-4 pt-4 pb-2 text-[18px] text-red-600 font-bold uppercase">Chờ xử lý</h1>
                        @elseif ($order->status == 'delivering')
                            <h1 class="pr-4 pt-4 pb-2 text-[18px] text-red-600 font-bold uppercase">Đang giao hàng</h1>
                        @elseif ($order->status == 'completed')
                            <h1 class="pr-4 pt-4 pb-2 text-[18px] text-red-600 font-bold uppercase">Hoàn thành</h1>
                        @endif

                    </div>
                    @foreach ($order->items as $item)
                        <div class="flex border-b mt-6 mb-6 pt-6 pb-6">
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
                                        <span class="text-[16px]">Adidas Alphabounce Beyond Cloud White</span> <br>
                                        <span class="font-bold">x{{ $item->quantity }}</span>
                                    </div>

                                    <div class="pr-6 text-[16px]">
                                        <span
                                            class="italic font-bold text-red-600">{{ number_format($item->price, 0, ',', '.') }}
                                            đ</span>
                                    </div>
                                @endif
                            @endforeach


                        </div>
                        <div class="flex justify-between pb-6 pr-4 text-[16px]">
                            <div class="pl-6">
                                <p>Ngày đặt hàng: {{ $order->created_at }}</p>
                            </div>
                            <div>
                                <span class="text-[18px]">Thành tiền: </span>
                                <span
                                    class="italic font-bold text-red-600 text-[22px]">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                    đ</span>
                            </div>

                        </div>
                    @endforeach

                </div>
            @endforeach
        @else
            <h2 class="text-xl font-bold mb-6 uppercase text-gray-500 bg-slate-100 pt-2 pb-2 pl-2">Bạn chưa có đơn hàng nào
            </h2>

        @endif


    </div>
@endsection
