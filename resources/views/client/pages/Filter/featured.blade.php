{{-- {{ dd($sp) } --}}
@extends('client.layouts.default')

@section('title', 'Sản Phẩm')

@section('content')
    <div class="container pt-[20px]">
        <div class="align-middle text-[30px] text-blue-900 font-bold flex justify-center">Sản Phẩm</div>
        <div class="flex">
            <div class="w-1/3 p-4">
                <div>
                    <div class="align-middle flex justify-center font-bold mb-4 text-[25px]">Thương Hiệu</div>
                    <div class="img">
                        <div class="align-middle flex justify-center">
                            <a href="{{ route('products.filterByCategory', ['id' => 1]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                                <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Adidas-Saigon-Sneaker.png"
                                    alt="Adidas" class="max-w-[70px] h-auto">
                            </a>
                            <a href="{{ route('products.filterByCategory', ['id' => 4]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                                <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Nike-Saigon-Sneaker.png"
                                    alt="Nike" class="max-w-[70px] h-auto">
                            </a>
                        </div>
                        <div class="align-middle flex justify-center">
                            <a href="{{ route('products.filterByCategory', ['id' => 5]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                                <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Vans-Saigon-Sneaker.png.webp"
                                    alt="Vans" class="max-w-[70px] h-auto">
                            </a>
                            <a href="{{ route('products.filterByCategory', ['id' => 7]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                                <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Converse-Saigon-Sneaker.png.webp"
                                    alt="Converse" class="max-w-[70px] h-auto">
                            </a>
                        </div>
                        <div class="align-middle flex justify-center">
                            <a href="{{ route('products.filterByCategory', ['id' => 6]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                                <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/McQueen-Saigon-Sneaker.png.webp"
                                    alt="McQueen" class="max-w-[70px] h-auto">
                            </a>
                            <a href="{{ route('products.filterByCategory', ['id' => 2]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                                <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Balenciaga-Saigon-Sneaker.png.webp"
                                    alt="Balenciaga" class="max-w-[70px] h-auto">
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <hr class="mx-auto pb-5 w-1/2 border-t border-gray-300">

                <div>
                    <div class="align-middle flex justify-center font-bold mb-4 text-[25px]">Nổi Bật</div>
                    <div class="flex flex-col items-center gap-4">
                        <a href="{{ route('products.filterByFeatured', ['slug' => 'LuxuryBrand']) }}"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center w-[50%] h-[80px]">
                            <span class="font-bold text-center">Luxury Brand</span>
                        </a>
                        <a href="{{ route('products.filterByFeatured', ['slug' => 'PhanQuang']) }}"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center w-[50%] h-[80px]">
                            <span class="font-bold text-center">Phản quang</span>
                        </a>
                        <a href="{{ route('products.filterByFeatured', ['slug' => 'Retro']) }}"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center w-[50%] h-[80px]">
                            <span class="font-bold text-center">Retro</span>
                        </a>
                    </div>
                </div>


                <hr class="mx-auto pb-5 w-1/2 border-t border-gray-300">

                <div>
                    <div class="align-middle flex justify-center font-bold mb-4 text-[25px]">Giá</div>
                    <div class="flex flex-col items-center gap-4">
                        <a href="{{ route('products.filterByPrice', ['min' => 200, 'max' => 500]) }}"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center w-[50%] h-[80px]">
                            <span class="font-bold text-center">200 - 500</span>
                        </a>
                        <a href="{{ route('products.filterByPrice', ['min' => 500, 'max' => 1000]) }}"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center w-[50%] h-[80px]">
                            <span class="font-bold text-center">500 - 1tr</span>
                        </a>
                        <a href="{{ route('products.filterByPrice', ['min' => 1000, 'max' => 2000]) }}"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center w-[50%] h-[80px]">
                            <span class="font-bold text-center">1tr - 2tr</span>
                        </a>
                        <a href="{{ route('products.filterByPrice', ['min' => 2000, 'max' => 2500]) }}"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center w-[50%] h-[80px]">
                            <span class="font-bold text-center">2tr - 2tr5</span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="w-2/3 p-4 ">
                <div class="flex">
                    <div class="w-1/2 px-4 ">
                        <a href="{{ route('home') }}">Trang Chủ /</a>
                        <a href="{{ route('product') }}">Sản Phẩm</a>
                    </div>
                    <div class="w-1/2 justify-end flex pr-[90px]">
                        <div class="relative inline-block">
                            <select id="sort"
                                class="mt-1 block w-[150px] h-[30px] bg-white border text-[20px] border-gray-300 font-bold rounded focus:outline-none focus:ring focus:ring-gray-400">
                                <option hover:bg-black">Bán chạy</option>
                                <option hover:bg-black">Mới nhất</option>
                                <option hover:bg-black">Giá tăng dần</option>
                                <option hover:bg-black">Giá giảm dần</option>
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                @if ($featured->count() > 0)
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($featured as $item)
                            @if ($item->status == 'active')
                                <div class="max-w-[220px] max-h-[400px] border border-gray-300 rounded-lg p-4">
                                    <div
                                        class="bg-red-600 text-white text-xs font-bold px-2 py-1 inline-block rounded-tl-md rounded-br-md mb-2">
                                        NEW
                                    </div>
                                    <a href="{{ route('product.detail', ['id' => $item->product_id]) }}"
                                        class="flex justify-center">
                                        <img src="{{ $item->image }}" alt="{{ $item->product_name }}" class="w-[70%]">
                                    </a>
                                    <a href="{{ route('product.detail', ['id' => $item->product_id]) }}"
                                        class="text-gray-800 font-bold text-base pt-[20px] flex justify-center">
                                        {{ $item->product_name }} <br>
                                    </a>
                                    <a href="{{ route('product.detail', ['id' => $item->product_id]) }}"
                                        class="text-gray-500 text-xs font-bold uppercase">
                                        {{ $item->product_id }}
                                    </a>
                                    <p class="text-gray-900 font-bold text-base">
                                        {{ number_format($item->price, 0, ',', '.') }} VND
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
