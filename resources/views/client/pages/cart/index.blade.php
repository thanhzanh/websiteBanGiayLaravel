@extends('client.layouts.detail')

@section('title', 'Sản Phẩm')

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
                        <th class="px-4 py-2 border border-gray-200 text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sản phẩm -->
                    <tr>
                        <td class="px-4 py-2 border border-gray-200 flex items-center">
                            <img src="https://via.placeholder.com/80" alt="Product Image"
                                class="w-20 h-20 object-cover rounded-lg mr-4">
                            <span>Giày Vans Vault Knu Skool VR3 x Imran Potato Like Auth - 40</span>
                        </td>
                        <td class="px-4 py-2 border border-gray-200 text-center">850.000₫</td>
                        <td class="px-4 py-2 border border-gray-200 text-center">
                            <div class="flex items-center justify-center">
                                <input type="number" class="w-12 text-center border border-gray-300 rounded-md mx-2"
                                    value="2">
                            </div>
                        </td>
                        <td class="px-4 py-2 border border-gray-200 text-center font-bold">1.700.000₫</td>
                        <td class="px-4 py-2 border border-gray-200 text-center">
                            <button class="text-gray-500 hover:text-red-600">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </td>
                    </tr>
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
                    <span class="text-gray-900 font-bold">1.700.000₫</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Giao hàng</span>
                    <span class="text-gray-900">30.000₫</span>
                </div>
                <div class="text-sm text-gray-500">Tùy chọn giao hàng sẽ được cập nhật trong quá trình thanh toán.</div>
            </div>
            <div class="flex justify-between text-lg font-bold mb-4">
                <span>Tổng</span>
                <span>1.730.000₫</span>
            </div>
            <button class="w-full bg-gray-500 text-white py-3 rounded-lg hover:bg-gray-600 font-bold">
                Tiến hành thanh toán
            </button>
        </div>
    </div>


@endsection
