@extends('client.layouts.detail')

@section('title', 'Sản Phẩm')

@section('main')
    <div class="content max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <div class="breadcrumb mb-4 text-gray-600 text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Trang chủ</a> /
            <a href="{{ route('product') }}" class="hover:underline">Sản Phẩm</a> /
            <span class="font-bold">{{ $product->product_name }}</span>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/2 flex flex-col items-center">
                <div class="w-full mb-4">
                    <img class="w-full rounded-lg shadow-lg" src="{{ $product->image }}" alt="{{ $product->product_name }}">
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <img src="{{ $product->image }}" alt="Hình phụ 1" class="w-24 h-24 object-cover rounded-md shadow-md">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2024/11/5-150x150.jpg.avif" alt="Hình phụ 2"
                        class="w-24 h-24 object-cover rounded-md shadow-md">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2024/11/6-150x150.jpg.avif" alt="Hình phụ 3"
                        class="w-24 h-24 object-cover rounded-md shadow-md">
                </div>
                @if ($product->status == 1)
                    <div
                        class="bg-red-600 text-white text-xs font-bold px-2 py-1 absolute top-4 right-4 rounded-md shadow-md">
                        NEW
                    </div>
                @endif
            </div>


            <div class="md:w-1/2">
                <h1 class="text-3xl font-bold mb-4">{{ $product->product_name }}</h1>
                <p class="text-2xl font-bold text-black mb-2">
                    @if ($product->discount > 0)
                        <!-- Hiển thị giá gốc có gạch ngang với dấu phân cách hàng nghìn -->
                        <span class="line-through text-gray-500">
                            {{ number_format($product->price, 0, ',', '.') }}đ
                        </span>
                        <!-- Tính và hiển thị giá đã giảm -->
                        <span class="text-red-500 ml-2">
                            {{ number_format($product->price * (1 - $product->discount / 100), 0, ',', '.') }}đ
                        </span>
                        <!-- Hiển thị phần trăm giảm giá -->
                        <span class="text-red-500 text-lg ml-2">(-{{ $product->discount }}%)</span>
                    @else
                        <!-- Hiển thị giá bình thường -->
                        {{ number_format($product->price, 0, ',', '.') }}đ
                    @endif
                </p>


                <p class="text-gray-700 mb-6">{{ $product->description }}</p>

                {{-- <div class="size pt-7 flex">
                    <div class="font-bold text-[20px] pt-[15px] pr-[12px]">Size:</div>
                    <div class="flex flex-wrap gap-3 mt-2">
                        @php
                            $sizes = explode(',', $product->size);
                        @endphp

                        @foreach ($sizes as $size)
                            <a href="#"
                                class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-bold hover:text-white hover:bg-black transition duration-300">
                                {{ $size }}
                            </a>
                        @endforeach
                    </div>
                </div> --}}


                <a class="bg-black text-white font-bold py-3 px-6 rounded-full my-5 hover:bg-gray-800 transition duration-300 inline-block"
                    href="#">
                    THÊM VÀO GIỎ HÀNG
                </a>

                <div class="delivery-info mt-8 text-gray-600 text-sm space-y-2">
                    <p>🚚 Miễn phí vận chuyển toàn quốc cho đơn hàng trên 1tr.</p>
                    <p>⚡ Giao nhanh 2h trong nội thành HCM.</p>
                    <p>⏰ Thời gian vận chuyển trung bình 3-4 ngày.</p>
                </div>

                <div class="store-info mt-6 border-dotted border-2 border-gray-300 p-4 rounded-md bg-gray-50">
                    <p class="font-bold">Visit our store in HCM city</p>
                    <p class="font-bold">ĐỊA CHỈ:</p>
                    <p>Phone: 0903 150 443</p>
                    <p>180 Ca0 Lỗ, Phường 4, Q8, HCM.</p>
                    <a href="#" class="text-blue-500 underline hover:text-blue-700">Google map</a>
                </div>
            </div>
        </div>
    </div>
@endsection
