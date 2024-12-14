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
                            <a href="{{ route('products.filterByCategory', ['slug' => 3]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                                <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Adidas-Saigon-Sneaker.png"
                                    alt="Adidas" class="max-w-[70px] h-auto">
                            </a>
                            <a href="{{ route('products.filterByCategory', ['slug' => 2]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                                <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Nike-Saigon-Sneaker.png"
                                    alt="Nike" class="max-w-[70px] h-auto">
                            </a>
                        </div>
                        <div class="align-middle flex justify-center">
                            <a href="{{ route('products.filterByCategory', ['slug' => 4]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                                <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Vans-Saigon-Sneaker.png.webp"
                                    alt="Vans" class="max-w-[70px] h-auto">
                            </a>
                            <a href="{{ route('products.filterByCategory', ['slug' => 5]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
                                <img src="https://saigonsneaker.com/wp-content/uploads/2020/05/Converse-Saigon-Sneaker.png.webp"
                                    alt="Converse" class="max-w-[70px] h-auto">
                            </a>
                        </div>
                        <div class="align-middle flex justify-center">
                            <a href="{{ route('products.filterByCategory', ['slug' => 6]) }}"
                                class="bg-white rounded-lg m-1 shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center">
<img src="https://saigonsneaker.com/wp-content/uploads/2020/05/McQueen-Saigon-Sneaker.png.webp"
                                    alt="McQueen" class="max-w-[70px] h-auto">
                            </a>
                            <a href="{{ route('products.filterByCategory', ['slug' => 1]) }}"
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
                        <a href="{{ route('products.filterByFeatured', ['slug' => '1']) }}"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center w-[50%] h-[80px]">
                            <span class="font-bold text-center">Luxury Brand</span>
                        </a>
                        <a href="{{ route('products.filterByFeatured', ['slug' => '2']) }}"
                            class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 p-4 flex items-center justify-center w-[50%] h-[80px]">
                            <span class="font-bold text-center">Phản quang</span>
                        </a>
                        <a href="{{ route('products.filterByFeatured', ['slug' => '3']) }}"
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
                    <div class="w-1/2 px-4">
                        <a href="{{ route('home') }}">Trang Chủ /</a>
                        <a href="{{ route('product') }}">Sản Phẩm</a>
                    </div>
                    <div class="w-1/2 justify-end flex pr-[90px]">
                        <div class="relative inline-block">
                            <select id="sort"
                                class="mt-1 block w-[150px] h-[30px] bg-white border text-[20px] border-gray-300 font-bold rounded focus:outline-none focus:ring focus:ring-gray-400"
                                onchange="handleSortChange(this.value)">
                                <option value="best-seller" {{ $sort == 'best-seller' ? 'selected' : '' }}>Bán chạy
                                </option>
                                <option value="newest" {{ $sort == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                                <option value="price-asc" {{ $sort == 'price-asc' ? 'selected' : '' }}>Giá tăng dần
                                </option>
                                <option value="price-desc" {{ $sort == 'price-desc' ? 'selected' : '' }}>Giá giảm dần
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                {{-- <div>
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($product as $item)
                            <div class="max-w-[220px] max-h-[400px] border border-gray-300 rounded-lg p-4">
                                <div
                                    class="bg-red-600 text-white text-xs font-bold px-2 py-1 inline-block rounded-tl-md rounded-br-md mb-2">
                                    NEW
</div>
                                <a href="{{ route('product.detail', ['id' => $item->slug]) }}" class="flex justify-center">
                                    @if ($item->images->isNotEmpty())
                                        <img class="w-auto"
                                            src="{{ asset('storage/' . $item->images->first()->file_image_url) }}"
                                            alt="{{ $item->product_name }}" class="w-auto h-40 object-cover">
                                    @endif
                                </a>
                                <a href="{{ route('product.detail', ['id' => $item->slug]) }}"
                                    class="text-gray-800 font-bold text-base pt-[20px] flex justify-center">
                                    {{ $item->product_name }} <br>
                                </a>
                                <a href="{{ route('product.detail', ['id' => $item->slug]) }}"
                                    class="text-gray-500 text-xs font-bold uppercase">
                                    {{ $item->product_id }}
                                </a>
                                <span class="line-through text-gray-500">
                                    {{ number_format($item->price, 0, ',', '.') }}đ
                                </span>
                                <span class="font-bold ml-2">
                                    {{ number_format($item->price * (1 - $item->discount / 100), 0, ',', '.') }}đ
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div> --}}
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($product as $item)
                        @if ($item->status == 'active')
                            <div class="max-w-[220px] max-h-[400px] border border-gray-300 rounded-lg p-4">
                                <div
                                    class="bg-red-700 text-white text-xs font-bold px-2 py-1 inline-block rounded-tl-md rounded-br-md mb-2 justify-between">
                                    {{-- <span class="text-red-500 text-lg ml-2">(-{{ $item->discount }}%)</span> --}}
                                    <span>NEW</span>
                                </div>
                                <div>
                                    <a href="{{ route('product.detail', ['id' => $item->slug]) }}">
                                        <div class="w-auto">
                                            @if ($item->images->isNotEmpty())
                                                <img class="w-auto"
                                                    src="{{ asset('storage/' . $item->images->first()->file_image_url) }}"
                                                    alt="{{ $item->product_name }}" class="w-auto h-40 object-cover">
@endif
                                            <p class="mt-2 text-[17px] italic">{{ $item->product_name }}</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="mt-2">
                                    @foreach ($categories as $category)
                                        @if ($category->product_category_id == $item->product_category_id)
                                            <p class="text-gray-500 text-[14px] font-bold uppercase">
                                                {{ $category->product_category_name }}</p>
                                        @endif
                                    @endforeach

                                    <span class="line-through text-gray-500">
                                        {{ number_format($item->price, 0, ',', '.') }}đ
                                    </span>
                                    <span class="font-bold ml-2">
                                        {{ number_format($item->price * (1 - $item->discount / 100), 0, ',', '.') }}đ
                                    </span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div </div>

                <script>
                    function handleSortChange(value) {
                        window.location.href = "{{ route('product.filterByPriceSort') }}?sort=" + value;
                    }
                </script>
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