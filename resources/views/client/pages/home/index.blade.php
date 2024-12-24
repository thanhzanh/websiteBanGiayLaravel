@extends('client.layouts.default')

@section('title', 'Trang Chủ')

@section('content')
    <div class="place-items-center text-justify w-full h-full p-[20px]">

        <div class="banner w-full flex justify-center">
                <a href="{{ route('product') }}">
                    <img
                        src="https://media.istockphoto.com/id/1150765714/vi/vec-to/bi%E1%BB%83u-ng%E1%BB%AF-vector-b%C3%A1n-h%C3%A0ng-gi%C3%A0y-sneaker.jpg?s=1024x1024&w=is&k=20&c=hQyJDlYzdO9zVqvCyRU2tXa4O0DtEZp5k883OaOQKJY="
                        alt="Banner"
                        class="w-full h-auto md:w-[800px] md:h-[400px] lg:w-[1000px] lg:h-[500px] xl:w-[1200px] xl:h-[600px] mx-auto"
                    />
                </a>
        </div>
        

        <div class="inner-featured font-bold text-[22px] bg-red-600 w-full flex justify-center text-white mb-[20px] my-4">         
            <span class="pr-2"><i class="fa-solid fa-heart"></i></span>
            CÁC SẢN PHẨM NỔI BẬT CỦA SHOP          
            <span class="pl-2"><i class="fa-solid fa-heart"></i></span>
        </div>

        <div class="grid grid-cols-4 gap-x-4 gap-y-4 w-[1192px] inner-product-featured">
            @foreach ($spp as $item)
                @if ($item->featured == "1")
                    <div
                        class="border border-gray-200 rounded-lg p-4 shadow-md hover:shadow-lg transition-transform transform hover:-translate-y-1 bg-white inner-product-featured-item">
                        <div
                            class="bg-red-500 text-white text-xs font-bold px-2 py-1 inline-block rounded-tl-md rounded-br-md mb-3">
                            {{ $item->discount }} %
                        </div>
                        <a href="{{ route('product.detail', ['id' => $item->slug]) }}" class="block mb-3">

                            @if ($item->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $item->images->first()->file_image_url) }}"
                                    alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                            @endif
                        </a>
                        <a href="{{ route('product.detail', ['id' => $item->slug]) }}"
                            class="text-gray-900 font-bold hover:text-red-500">
                            {{ $item->product_name }}
                        </a>
                        <p class="text-gray-500 text-sm mt-1">
                            @foreach ($categories as $category)
                                @if ($category->product_category_id == $item->product_category_id)
                                    <p class="text-gray-500 text-[14px] font-bold uppercase">
                                        {{ $category->product_category_name }}</p>
                                @endif
                            @endforeach
                        </p>
                        <span class="line-through text-gray-500">
                            {{ number_format($item->price, 0, ',', '.') }}đ
                        </span>
                        <span class="font-bold ml-2">
                            {{ number_format($item->price * (1 - $item->discount / 100), 0, ',', '.') }}đ
                        </span>
                    </div>
                @endif
            @endforeach
        </div>
        {{-- {{ dd($spp) }} --}}


        <div class="relative w-[1192px] h-[574px] group mt-5 inner-new-balance">
            <img class="w-full h-full object-cover transition-opacity duration-300 group-hover:opacity-80"
                src="https://saigonsneaker.com/wp-content/uploads/2024/11/Screenshot-2022-08-19-223512.png.avif"
                alt="New Balance 574">
            <div
                class="absolute inset-0 flex flex-col justify-center items-center space-y-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <p class="text-4xl font-bold">New Balance 574</p>
                <a href="{{ route('product') }}" class="px-4 py-2 bg-slate-500 text-black font-bold rounded">XEM NGAY</a>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 w-[1192px] mt-8 inner-xem-ngay">
            <div class="relative bg-gray-200 text-center rounded-lg overflow-hidden">
                <img src="https://giaydino.com/wp-content/uploads/2023/08/Giay-Saint-Laurent-Court-Classic-Embroidered-White-Sieu-cap.jpg" alt="Nike AF1"
                    class="w-full h-[574px] object-cover">
                <div
                    class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t from-black to-transparent opacity-80">
                    <p class="text-white text-xl font-bold mb-2">Saint Laurent Court Classic Embroidered White</p>
                    <a href="{{ route('product') }}"
                        class="inline-block bg-white text-black font-bold px-4 py-2 hover:bg-slate-500">XEM
                        NGAY</a>
                </div>
            </div>

            <div class="relative bg-gray-300 text-center rounded-lg overflow-hidden">
                <img src="https://drake.vn/image/catalog/H%C3%ACnh%20content/gia%CC%80y%20Converse%20da%20bo%CC%81ng/giay-converse-da-bong-6.jpg" alt="Adidas Alphabounce"
                    class="w-full h-[574px] object-cover">
                <div
                    class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t from-black to-transparent opacity-80">
                    <p class="text-white text-xl font-bold mb-2">Converse Chuck Taylor All Star Seasonal Color Leather</p>
                    <a href="{{ route('product') }}"
                        class="inline-block bg-white text-black font-bold px-4 py-2 hover:bg-slate-500">XEM
                        NGAY</a>
                </div>
            </div>
        </div>

        <div class="inner-img-ban-chay">
            <a href="{{ route('product') }}"><img class="grid grid-cols-2 gap-4 w-[1192px] mt-8"
                    src="https://file.hstatic.net/1000230642/collection/3_da9a91027cd0488581c18e767bd6e453.jpg" alt=""></a>
        </div>

        <div class="relative w-[1192px] h-[474px] group pt-[30px] inner-img-last">
            <img class="w-full h-full object-cover transition-opacity duration-300 group-hover:opacity-80"
                src="https://saigonsneaker.com/wp-content/uploads/elementor/thumbs/maxresdefault-qgjqygbo0wpjtxt8m1249ugbvf9cqm2yyx28d1t11k.jpg"
                alt="">
            <div
                class="absolute inset-0 flex flex-col justify-center items-center space-y-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 inner-ban-chay">
                <p class="text-4xl font-bold">SẢN PHẨM BÁN CHẠY</p>
                <a href="{{ route('product') }}" class="px-4 py-2 bg-slate-500 text-black font-bold rounded">XEM NGAY</a>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 w-[1192px] mt-8 inner-img-last">
            <div class="relative bg-gray-200 text-center rounded-lg overflow-hidden">
                <a href="{{ route('product') }}"><img
                        src="https://drake.vn/image/catalog/H%C3%ACnh%20content/gi%C3%A0y-sneaker-converse/giay-sneaker-converse-09.jpg"
                        alt="" class="w-full h-[574px] object-cover"></a>
            </div>

            <div class="relative bg-gray-300 text-center rounded-lg overflow-hidden">
                <a href="{{ route('product') }}"><img
                        src="https://bizweb.dktcdn.net/100/479/837/files/giay-sneaker-catsofa-love-mau-hong-3.jpg?v=1683458967345"
                        alt="" class="w-full h-[574px] object-cover"></a>
            </div>
        </div>

        <div class="font-bold text-[22px] bg-red-600 w-full flex justify-center text-white mb-[20px] my-4">         
            <span class="pr-2"><i class="fa-solid fa-heart"></i></span>
            THƯƠNG HIỆU          
            <span class="pl-2"><i class="fa-solid fa-heart"></i></span>
        </div>
        <div class="brand">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 inner-brand">
                <a href="{{ route('products.filterByCategory', ['slug' => 1]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Adidas-Saigon-Sneaker.png" alt="Adidas"
                        class="max-w-[150px] h-auto">
                </a>
                <a href="{{ route('products.filterByCategory', ['slug' => 4]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Nike-Saigon-Sneaker.png" alt="Nike"
                        class="max-w-[150px] h-auto">
                </a>
                <a href="{{ route('products.filterByCategory', ['slug' => 5]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Vans-Saigon-Sneaker.png.webp"
                        alt="Vans" class="max-w-[150px] h-auto">
                </a>
                <a href="{{ route('products.filterByCategory', ['slug' => 7]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Converse-Saigon-Sneaker.png.webp"
                        alt="Converse" class="max-w-[150px] h-auto">
                </a>
                <a href="{{ route('products.filterByCategory', ['slug' => 6]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/McQueen-Saigon-Sneaker.png.webp"
                        alt="McQueen" class="max-w-[150px] h-auto">
                </a>
                <a href="{{ route('products.filterByCategory', ['slug' => 2]) }}"
                    class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Balenciaga-Saigon-Sneaker.png.webp"
                        alt="Balenciaga" class="max-w-[150px] h-auto">
                </a>
            </div>
        </div>

    </div>
    <button id="scrollButton"
        class="fixed bottom-10 right-10 w-14 h-14 bg-slate-300 text-white rounded-full flex items-center justify-center shadow-lg hover:bg-gray-800 transition-all">
        <i class="fa-solid fa-up-long text-xl"></i>
    </button>

    <script>
        document.getElementById('scrollButton').addEventListener('click', function() {
            // Cuộn trang lên đầu một cách mượt mà
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
@endsection
