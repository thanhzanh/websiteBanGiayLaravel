{{-- {{ dd($sp) } --}}
@extends('client.layouts.default')

@section('title', 'Trang Sản Phẩm')

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
                                class="bg-white rounded-lg m-1 m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
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
                            <a href="{{ route('products.filterByCategory', ['id' => 1]) }}"
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
                    <div class="mx-auto pb-5 w-1/2 border-gray-300">
                        <ul>
                            <li
                                class="flex justify-center mb-3 bg-slate-200 rounded border-solid hover:text-white hover:bg-black hover:font-bold transition duration-300">
                                <a href="" class="m-3">Luxury Brand</a>
                            </li>
                            <li
                                class="flex justify-center mb-3 bg-slate-200 rounded border-solid hover:text-white hover:bg-black hover:font-bold transition duration-300">
                                <a href="" class="m-3 ">Phản quang</a>
                            </li>
                            <li
                                class="flex justify-center mb-3 bg-slate-200 rounded border-solid hover:text-white hover:bg-black hover:font-bold transition duration-300">
                                <a href="" class="m-3 ">Retro</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <hr class="mx-auto pb-5 w-1/2 border-t border-gray-300">
                <div>
                    <div class="align-middle flex justify-center font-bold mb-4 text-[25px]">Giá</div>
                    <div class="mx-auto pb-5 w-1/2 border-gray-300">
                        <ul>
                            <li
                                class="flex justify-center mb-3 bg-slate-200 rounded border-solid hover:text-white hover:bg-black hover:font-bold transition duration-300">
                                <a href="" class="m-3">200
                                    - 500</a>
                            </li>
                            <li
                                class="flex justify-center mb-3 bg-slate-200 rounded border-solid hover:text-white hover:bg-black hover:font-bold transition duration-300">
                                <a href="" class="m-3">500
                                    - 1tr</a>
                            </li>
                            <li
                                class="flex justify-center mb-3 bg-slate-200 rounded border-solid hover:text-white hover:bg-black hover:font-bold transition duration-300">
                                <a href="" class="m-3">1tr
                                    - 2tr</a>
                            </li>
                            <li
                                class="flex justify-center mb-3 bg-slate-200 rounded border-solid hover:text-white hover:bg-black hover:font-bold transition duration-300">
                                <a href="" class="m-3">2tr
                                    trở lên</a>
                            </li>
                        </ul>
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

                <div class="grid grid-cols-4 gap-4">
                    @foreach ($data as $item)
                        <!-- Dùng $data để lấy sản phẩm -->
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
                    @endforeach
                </div>

                <!-- Hiển thị phân trang -->
                <div class="mt-4">
                    {!! $data->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
