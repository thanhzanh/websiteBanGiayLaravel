@extends('client.layouts.default')

@section('title', 'Trang Chủ')

@section('content')
    <div class="grid place-items-center text-justify w-full h-full p-[20px]">

        <div class="banner">
            <div>
                <a href="#"><img src="https://xamsneaker.com/wp-content/uploads/bannerxam.jpg" alt=""></a>
            </div>
        </div>

        <div class="font-bold text-[25px] bg-red-600 w-full grid place-items-center text-white mb-[20px] my-4">
            CÁC SẢN PHẨM NỔI BẬT CỦA SHOP
        </div>

        <div class="grid grid-cols-4 gap-6">
            @foreach ($spp as $item)
                <div
                    class="border border-gray-200 rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 bg-white">
                    <div
                        class="bg-red-500 text-white text-xs font-bold px-2 py-1 inline-block rounded-tl-md rounded-br-md mb-3">
                        NEW
                    </div>
                    <a href="{{ route('product.detail', ['id' => $item->product_id]) }}" class="block mb-3">
                        @if ($item->images->isNotEmpty())
                            <img src="{{ $item->images->first()->file_image_url }}" alt="{{ $item->product_name }}"
                                class="w-full h-[180px] object-cover rounded-md">
                        @else
                            <img src="default_image.jpg" alt="Default Image"
                                class="w-full h-[180px] object-cover rounded-md">
                        @endif
                    </a>
                    <a href="{{ route('product.detail', ['id' => $item->product_id]) }}"
                        class="text-gray-900 font-bold text-base hover:text-red-500">
                        {{ $item->product_name }}
                    </a>
                    <p class="text-gray-500 text-sm mt-1">
                        Mã sản phẩm: {{ $item->product_id }}
                    </p>
                    <p class="text-gray-900 font-bold text-lg mt-2">
                        {{ number_format($item->price, 0, ',', '.') }} VND
                    </p>
                    <a href="{{ route('product.detail', ['id' => $item->product_id]) }}"
                        class="block text-center text-white bg-blue-600 hover:bg-blue-700 py-2 mt-3 rounded-md transition-colors">
                        Xem chi tiết
                    </a>
                </div>
            @endforeach
F
        </div>
        {{-- {{ dd($spp) }} --}}


        <div class="relative w-[1192px] h-[574px] group mt-5">
            <img class="w-full h-full object-cover transition-opacity duration-300 group-hover:opacity-80"
                src="https://saigonsneaker.com/wp-content/uploads/2024/11/Screenshot-2022-08-19-223512.png.avif"
                alt="New Balance 574">
            <div
                class="absolute inset-0 flex flex-col justify-center items-center space-y-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <p class="text-4xl font-bold">New Balance 574</p>
                <a href="{{ route('product') }}" class="px-4 py-2 bg-slate-500 text-black font-bold rounded">XEM NGAY</a>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 w-[1192px] mt-8">
            <div class="relative bg-gray-200 text-center rounded-lg overflow-hidden">
                <img src="https://saigonsneaker.com/wp-content/uploads/2024/11/IMG_1051.jpg.avif" alt="Nike AF1"
                    class="w-full h-[574px] object-cover">
                <div
                    class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t from-black to-transparent opacity-80">
                    <p class="text-white text-xl font-bold mb-2">Nike AF1</p>
                    <a href="{{ route('product') }}"
                        class="inline-block bg-white text-black font-bold px-4 py-2 hover:bg-slate-500">XEM
                        NGAY</a>
                </div>
            </div>

            <div class="relative bg-gray-300 text-center rounded-lg overflow-hidden">
                <img src="https://saigonsneaker.com/wp-content/uploads/2024/11/IMG_1834.jpg.avif" alt="Adidas Alphabounce"
                    class="w-full h-[574px] object-cover">
                <div
                    class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t from-black to-transparent opacity-80">
                    <p class="text-white text-xl font-bold mb-2">ADIDAS ALPHABOUNCE</p>
                    <a href="{{ route('product') }}"
                        class="inline-block bg-white text-black font-bold px-4 py-2 hover:bg-slate-500">XEM
                        NGAY</a>
                </div>
            </div>
        </div>

        <div>
            <a href="{{ route('product') }}"><img class="grid grid-cols-2 gap-4 w-[1192px] mt-8"
                    src="https://saigonsneaker.com/wp-content/uploads/2024/05/11-1536x400.png.avif" alt=""></a>
        </div>

        <div class="relative w-[1192px] h-[474px] group pt-[30px]">
            <img class="w-full h-full object-cover transition-opacity duration-300 group-hover:opacity-80"
                src="https://saigonsneaker.com/wp-content/uploads/elementor/thumbs/maxresdefault-qgjqygbo0wpjtxt8m1249ugbvf9cqm2yyx28d1t11k.jpg"
                alt="">
            <div
                class="absolute inset-0 flex flex-col justify-center items-center space-y-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <p class="text-4xl font-bold">SẢN PHẨM BÁN CHẠY</p>
                <a href="{{ route('product') }}" class="px-4 py-2 bg-slate-500 text-black font-bold rounded">XEM NGAY</a>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 w-[1192px] mt-8">
            <div class="relative bg-gray-200 text-center rounded-lg overflow-hidden">
                <a href="{{ route('product') }}"><img
                        src="https://saigonsneaker.com/wp-content/uploads/2021/07/banner-july-3.png.avif" alt=""
                        class="w-full h-[574px] object-cover"></a>
            </div>

            <div class="relative bg-gray-300 text-center rounded-lg overflow-hidden">
                <a href="{{ route('product') }}"><img
                        src="https://saigonsneaker.com/wp-content/uploads/2022/03/classichoodie-localbrand-xem-ngay-40-localbrand-1.jpg.avif"
                        alt="" class="w-full h-[574px] object-cover"></a>
            </div>
        </div>

        <div class="font-bold text-[25px] bg-red-600 w-full grid place-items-center text-white mb-[20px] my-4">
            THƯƠNG HIỆU
        </div>
        <div class="brand">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <a href="{{ route('products.filterByCategory', ['id' => 3]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Adidas-Saigon-Sneaker.png" alt="Adidas"
                        class="max-w-[150px] h-auto">
                </a>
                <a href="{{ route('products.filterByCategory', ['id' => 2]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Nike-Saigon-Sneaker.png" alt="Nike"
                        class="max-w-[150px] h-auto">
                </a>
                <a href="{{ route('products.filterByCategory', ['id' => 4]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Vans-Saigon-Sneaker.png.webp"
                        alt="Vans" class="max-w-[150px] h-auto">
                </a>
                <a href="{{ route('products.filterByCategory', ['id' => 5]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Converse-Saigon-Sneaker.png.webp"
                        alt="Converse" class="max-w-[150px] h-auto">
                </a>
                <a href="{{ route('products.filterByCategory', ['id' => 6]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/McQueen-Saigon-Sneaker.png.webp"
                        alt="McQueen" class="max-w-[150px] h-auto">
                </a>
                <a href="{{ route('products.filterByCategory', ['id' => 1]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Balenciaga-Saigon-Sneaker.png.webp"
                        alt="Balenciaga" class="max-w-[150px] h-auto">
                </a>
            </div>
        </div>

    </div>
@endsection
