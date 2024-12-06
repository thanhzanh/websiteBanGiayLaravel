@extends('client.layouts.detail')

@section('title', 'Giỏ Hàng')

@section('main')
    <div class="container mx-auto my-10 px-4">
        <!-- Giỏ hàng -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Giỏ Hàng</h2>
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border border-gray-200 text-left">Sản Phẩm</th>
                        <th class="px-4 py-2 border border-gray-200 text-center">Giá</th>
                        <th class="px-4 py-2 border border-gray-200 text-center">Số Lượng</th>
                        <th class="px-4 py-2 border border-gray-200 text-center">Tạm Tính</th>
                        <th class="px-4 py-2 border border-gray-200 text-center"> Xóa </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $product)
                        <!-- Sản phẩm -->
                        <tr>
                            <td class="px-4 py-2 border border-gray-200 flex items-center">
                                @foreach ($products as $item)
                                    @if ($product->product_id == $item->product_id)
                                        {{-- hinh anh --}}
                                        <div class="w-[120px] h-[120px] mr-8">
                                            <a href="{{ route('product.detail', ['slug' => $item->slug]) }}">
                                                <img class="w-auto"
                                                    src="{{ asset('storage/' . $item->images->first()->file_image_url) }}"
                                                    alt="{{ $item->product_name }}" class="w-auto h-40 object-cover">
                                            </a>
                                        </div>
                                        {{-- ten san pham --}}
                                        <span>{{ $item->product_name }} -</span>

                                        {{-- size --}}
                                        @foreach ($sizes as $size)
                                            @if ($size->size_id == $product->size_id)
                                                <span class="font-bold">
                                                    {{ $size->size_name }}
                                                </span>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>

                            <td class="px-4 py-2 border border-gray-200 text-center">
                                <span class="font-bold">{{ number_format($product->price, 0, ',', '.') }} VND</span>
                            </td>
                            <td class="px-4 py-2 border border-gray-200 text-center">
                                <div class="flex items-center justify-center">
                                    <input name="quantity" product-id={{ $product->product_id }} type="number"
                                        class="w-12 text-center border border-gray-300 rounded-md mx-2" min="1"
                                        value="{{ $product->quantity }}">
                                </div>
                            </td>
                            <td class="px-4 py-2 border border-gray-200 text-center">
                                <span
                                    class="font-bold">{{ number_format($product->price * $product->quantity, 0, ',', '.') }}
                                    VNĐ</span>
                            </td>
                            <td class="px-4 py-2 border border-gray-200 text-center">
                                <div class="inline-block">
                                    <form action="{{ route('cart.delete', ['id' => $product->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button title="Xóa"
                                            class="px-3 py-[0.3rem] bg-red-500 text-[1rem] font-bold text-white rounded-2xl hover:bg-black">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="flex justify-between mt-4">
                <button class="text-gray-700 border border-gray-400 px-4 py-2 rounded-lg hover:bg-black hover:text-white">
                    <a href="{{ route('product') }}">
                        ← Tiếp tục xem sản phẩm
                    </a>
                </button>
            </div>
        </div>

        <!-- Tổng cộng -->
        <div class="bg-white rounded-lg shadow-md p-6 mt-6">
            <h2 class="text-xl font-semibold mb-4">Cộng Giỏ Hàng</h2>


            <div class="border-b border-gray-200 pb-4 mb-4">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Tạm tính</span>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cartItems as $cartItem)
                        @php
                            $total += $cartItem->quantity * $cartItem->price;
                        @endphp
                    @endforeach

                    <span class="text-gray-900 font-bold">{{ number_format($total, 0, ',', '.') }} VNĐ</span>

                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Giao hàng</span>
                    <span class="text-gray-900 font-bold">0 VNĐ</span>
                </div>
                <div class="text-sm text-gray-500">Tùy chọn giao hàng sẽ được cập nhật trong quá trình thanh toán.</div>
            </div>
            <div class="flex justify-between text-lg font-bold mb-4">
                <span>Tổng thành tiền</span>
                @php
                    $total = 0;
                @endphp
                @foreach ($cartItems as $cartItem)
                    @php
                        $total += $cartItem->quantity * $cartItem->price;
                    @endphp
                @endforeach

                <span class="text-gray-900 font-bold">{{ number_format($total, 0, ',', '.') }} VNĐ</span>
            </div>

            {{-- @foreach ($cartItems as $cartItem)
                
                <div class="flex justify-between text-lg font-bold mb-4">
                    <span>Tổng thành tiền</span>
                    <span>1.730.000 VNĐ</span>
                </div>
                
            @endforeach --}}
            <button class="w-full bg-gray-500 text-white py-3 rounded-lg hover:bg-gray-600 font-bold">
                <a href="{{ route('check-out.index') }}">Tiến hành thanh toán</a>
                
            </button>
        </div>
    </div>


@endsection
