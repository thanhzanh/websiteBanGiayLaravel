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
            <div class="md:w-1/2 flex relative mt-4 group">
                <!-- Các hình ảnh phụ -->
                <div class="flex flex-col w-[125px] top-0">
                    <div class="top-0 h-[460px]">
                        @foreach ($product->images->slice(1) as $index => $image)
                            <img class="w-full my-2 h-[140px] object-cover rounded-md shadow-md cursor-pointer transition-transform duration-300 ease-in-out hover:scale-105"
                                 src="{{ asset('storage/' . $image->file_image_url) }}" 
                                 alt="Hình phụ"
                                 data-index="{{ $index + 1 }}" 
                                 title="{{ $product->product_name }}"
                                 onclick="changeMainImage('{{ asset('storage/' . $image->file_image_url) }}')">
                        @endforeach
                    </div>
                </div>

                <!-- Hình ảnh chính -->
                <div class="w-[460px] h-[440px] right-2 mb-4 ml-4 overflow-hidden relative">
                    <button id="prevButton" class="absolute left-0 z-10 text-black p-3 rounded-full opacity-0 group-hover:opacity-100 transition-opacity top-1/2 transform -translate-y-1/2 text-3xl">
                        <i class="fa-solid fa-angles-left"></i>
                    </button>
                    @if ($product->images->isNotEmpty())
                        <img id="mainImage" class="w-full h-auto rounded-lg shadow-lg object-cover transition-transform duration-300 ease-in-out transform hover:scale-125 hover:cursor-pointer"
                            src="{{ asset('storage/' . $product->images->first()->file_image_url) }}"
                            alt="{{ $product->product_name }}"
                            title="{{ $product->product_name }}">
                    @endif
                    <button id="nextButton" class="absolute right-0 z-10 text-black p-3 rounded-full opacity-0 group-hover:opacity-100 transition-opacity top-1/2 transform -translate-y-1/2 text-3xl">
                        <i class="fa-solid fa-angles-right"></i>
                    </button>
                </div>


                <!-- Label "NEW" -->
                @if ($product->status == 1)
                <div class="bg-red-600 text-white text-xs font-bold px-2 py-1 absolute top-4 right-4 rounded-md shadow-md">
                    NEW
                </div>
            @endif
        </div>


        <!-- Phần thông tin sản phẩm -->
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold mb-4">{{ $product->product_name }}</h1>
            <p class="text-2xl font-bold text-black mb-2">
                @if ($product->discount > 0)
                    <span class="line-through text-gray-500">
                        {{ number_format($product->price, 0, ',', '.') }}đ
                    </span>
                    <span class="text-red-500 ml-2">
                        {{ number_format($product->price * (1 - $product->discount / 100), 0, ',', '.') }}đ
                    </span>
                    <span class="text-red-500 text-lg ml-2">(-{{ $product->discount }}%)</span>
                @else
                    {{ number_format($product->price, 0, ',', '.') }}đ
                @endif
            </p>

            {{-- <p class="text-gray-700 mb-6">{{ $product->description }}</p> --}}

            <p class="text-black font-bold uppercase mt-7 text-[18px]"> Danh Mục :
                @foreach ($categories as $category)
                    @if ($category->product_category_id == $product->product_category_id)
                        {{ $category->product_category_name }}
                    @endif
                @endforeach
            </p>


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

            <div class="delivery-info mt-8 text-gray-600 text-sm space-y-2">
                <p>🚚 Miễn phí vận chuyển toàn quốc cho đơn hàng trên 1tr.</p>
                <p>⚡ Giao nhanh 2h trong nội thành HCM.</p>
                <p>⏰ Thời gian vận chuyển trung bình 3-4 ngày.</p>
            </div>

            <div class="store-info mt-6 border-dotted border-2 border-gray-300 p-4 rounded-md bg-gray-50">
                <p class="font-bold">Visit our store in HCM city</p>
                <p class="font-bold">ĐỊA CHỈ:</p>
                <p>Phone: 0903 150 443</p>
                <p>180 Cao Lỗ, Phường 4, Q8, HCM.</p>
                <a href="#" class="text-blue-500 underline hover:text-blue-700">Google map</a>
            </div>
        </div>
    </div>
    <div class="mt-8">
<h2 class="text-xl font-bold text-gray-800 mb-4 pl-2">MÔ TẢ SẢN PHẨM</h2>
<div class="bg-gray-50 p-6 rounded-lg shadow-md border border-gray-200 leading-relaxed text-gray-700 text-[19px]">
    <p>{{ $product->description }}</p>
    </div>
    </div>
</div>
<button id="scrollButton" class="fixed bottom-10 right-10 w-14 h-14 bg-slate-300 text-white rounded-full flex items-center justify-center shadow-lg hover:bg-gray-800 transition-all">
    <i class="fa-solid fa-up-long text-xl"></i>
</button>

<script>
    document.getElementById('scrollButton').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    const images = document.querySelectorAll('.top-0 img');
    let currentIndex = 0;

    const mainImage = document.getElementById('mainImage');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');

    nextButton.addEventListener('click', function() {
        if (currentIndex < images.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        mainImage.src = images[currentIndex].src;
    });

    prevButton.addEventListener('click', function() {
if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = images.length - 1;
        }
        mainImage.src = images[currentIndex].src;
    });

    // Hàm thay đổi hình ảnh chính khi click vào hình phụ
    function changeMainImage(imageSrc) {
        mainImage.src = imageSrc;
    }
</script>
@endsection