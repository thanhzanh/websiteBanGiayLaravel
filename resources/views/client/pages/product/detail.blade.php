@extends('client.layouts.detail')

@section('title', 'Sản Phẩm')

@section('main')
    <meta name="csrf-token" content="{{{ csrf_token() }}}">

    <div class="content max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <div class="breadcrumb mb-4 text-gray-600 text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Trang chủ</a> /
            <a href="{{ route('product') }}" class="hover:underline">Sản Phẩm</a> /
            <span class="font-bold">{{ $product->product_name }}</span>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/2 flex items-center relative">
                <!-- Các hình ảnh phụ -->
                <div class="flex flex-col w-[125px] top-0">
                    <div class="top-0 h-[460px]">
                        <!-- slice(1) bỏ qua hình đầu tiên -->
                        @foreach ($product->images->slice(1) as $image)
                            <img class="w-full my-2 h-[140px] object-cover rounded-md shadow-md transition-transform duration-300 ease-in-out hover:scale-105"
                                src="{{ asset('storage/' . $image->file_image_url) }}" alt="Hình phụ">
                        @endforeach
                    </div>

                </div>
                <!-- Hình ảnh chính -->
                <div class="w-[460px] h-[440px] right-2 mb-4 ml-4">
                    @if ($product->images->isNotEmpty())
                        <img class="w-full h-auto rounded-lg shadow-lg object-cover"
                            src="{{ asset('storage/' . $product->images->first()->file_image_url) }}"
                            alt="{{ $product->product_name }}">
                    @endif
                </div>

                <!-- Label "NEW" -->
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

                <form form-add-cart action="{{ route('cart.add', ['id' => $product->product_id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="size" id="size-input">
                    <input type="hidden" name="quantity" id="quantity-input" value="1">

                    
                    <div class="size pt-7 flex">
                        <div class="font-bold text-[20px] pt-[15px] pr-[12px]">Size:</div>
                        <div class="flex flex-wrap gap-3 mt-2">
                            @foreach ($sizes as $item)
                                <button btn-sizes class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-bold hover:text-white hover:bg-black transition duration-300" value="{{ $item->size_id }}">
                                    {{ $item->size_name }} 
                                </button>
                            @endforeach
                        </div>
                    </div>
    
                    <div class="flex items-center justify-start mt-5">
                        <p class="font-bold text-[20px] float-left mr-3">Số lượng: </p>
                        <button decrease-quantity class="px-4 py-1 bg-gray-200 hover:bg-black border-gray-300 border hover:text-white">-</button>
                        <input quantity type="text" class="w-12 py-[4px] text-center border outline-none border-gray-300" min="1" value="1">

                        <button increase-quantity class="px-4 py-1 bg-gray-200 hover:bg-black border-gray-300 border hover:text-white">+</button>
                    </div>
    
                    <button 
                        type="button"
                        btn-add-cart 
                        class="bg-black text-white font-bold py-3 px-6 rounded-full my-5 hover:bg-gray-800 transition duration-300 inline-block"
                        data-product-id={{ $product->product_id }}>
                        THÊM VÀO GIỎ HÀNG
                    </button>
                </form>
                

                {{-- size của mỗi sản phẩm --}}
                

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
