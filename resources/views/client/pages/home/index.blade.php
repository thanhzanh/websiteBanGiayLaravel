@extends('client.layouts.default')

@section('title', 'Trang Chủ')

@section('content')
    <div class="grid place-items-center text-justify w-full h-full p-[20px]">

        <div class="font-bold text-[25px] bg-red-600 w-full grid place-items-center text-white mb-[20px]">
            CÁC SẢN PHẨM NỔI BẬT CỦA SHOP
        </div>


        <div class="relative w-[1192px] h-[574px] group">

            <img class="w-full h-full object-cover transition-opacity duration-300 group-hover:opacity-80"
                src="https://saigonsneaker.com/wp-content/uploads/2024/11/Screenshot-2022-08-19-223512.png.avif"
                alt="New Balance 574">
            <div
                class="absolute inset-0 flex flex-col justify-center items-center space-y-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <p class="text-4xl font-bold">New Balance 574</p>
                <a href="#" class="px-4 py-2 bg-slate-500 text-black font-bold rounded">XEM NGAY</a>
            </div>
        </div>


        <div class="grid grid-cols-2 gap-4 w-[1192px] mt-8">
            <div class="relative bg-gray-200 text-center rounded-lg overflow-hidden">
                <img src="https://saigonsneaker.com/wp-content/uploads/2024/11/IMG_1051.jpg.avif" alt="Nike AF1"
                    class="w-full h-[574px] object-cover">
                <div
                    class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t from-black to-transparent opacity-80">
                    <p class="text-white text-xl font-bold mb-2">Nike AF1</p>
                    <a href="#"
                        class="inline-block bg-white text-black font-semibold px-4 py-2 hover:bg-slate-500">XEM NGAY</a>
                </div>
            </div>

            <div class="relative bg-gray-300 text-center rounded-lg overflow-hidden">
                <img src="https://saigonsneaker.com/wp-content/uploads/2024/11/IMG_1834.jpg.avif" alt="Adidas Alphabounce"
                    class="w-full h-[574px] object-cover">
                <div
                    class="absolute inset-0 flex flex-col justify-end p-4 bg-gradient-to-t from-black to-transparent opacity-80">
                    <p class="text-white text-xl font-bold mb-2">ADIDAS ALPHABOUNCE</p>
                    <a href="#"
                        class="inline-block bg-white text-black font-semibold px-4 py-2 hover:bg-slate-500">XEM NGAY</a>
                </div>
            </div>
        </div>

        <div>
            <a href=""><img class="grid grid-cols-2 gap-4 w-[1192px] mt-8"
                    src="https://saigonsneaker.com/wp-content/uploads/2024/05/11-1536x400.png.avif" alt=""></a>
        </div>

        <div class="relative w-[1192px] h-[474px] group pt-[30px]">
            <img class="w-full h-full object-cover transition-opacity duration-300 group-hover:opacity-80"
                src="https://saigonsneaker.com/wp-content/uploads/elementor/thumbs/maxresdefault-qgjqygbo0wpjtxt8m1249ugbvf9cqm2yyx28d1t11k.jpg"
                alt="">
            <div
                class="absolute inset-0 flex flex-col justify-center items-center space-y-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <p class="text-4xl font-bold">SẢN PHẨM BÁN CHẠY</p>
                <a href="#" class="px-4 py-2 bg-slate-500 text-black font-bold rounded">XEM NGAY</a>
            </div>
        </div>


        <div class="grid grid-cols-2 gap-4 w-[1192px] mt-8">
            <div class="relative bg-gray-200 text-center rounded-lg overflow-hidden">
                <a href=""> <img src="https://saigonsneaker.com/wp-content/uploads/2021/07/banner-july-3.png.avif"
                        alt="" class="w-full h-[574px] object-cover">
                </a>

            </div>

            <div class="relative bg-gray-300 text-center rounded-lg overflow-hidden">
                <a href=""> <img
                        src="https://saigonsneaker.com/wp-content/uploads/2022/03/classichoodie-localbrand-xem-ngay-40-localbrand-1.jpg.avif"
                        alt="" class="w-full h-[574px] object-cover">
                </a>
            </div>
        </div>
    </div>
@endsection
