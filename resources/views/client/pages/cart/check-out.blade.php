@extends('client.layouts.detail')

@section('title', 'Tiến hành thanh toán')

@section('main')
    <div class="container mx-auto p-8">
        <!-- Thông tin thanh toán -->
        <div>
            <form action="{{ route('order.create-order') }}" method="post">
                @csrf
                <!-- Thông tin giao hàng -->
                <div>
                    <div class="text-xl font-bold flex mb-4">
                        <p class="text-red-600 mr-4"><i class="fa-solid fa-location-dot"></i></p>
                        Địa chỉ giao hàng
                    </div>
                    <div class="container mx-auto p-4">
                        <!-- Hiện thị thông tin địa chỉ hiện tại -->
                        <div id="currentAddress" class="space-y-4 bg-white p-4 rounded-lg shadow-md">
                            <p class="text-lg font-semibold">Địa chỉ giao hàng hiện tại:</p>
                            <p id="currentAddressDisplay" class="text-gray-700">{{ $defaultAddress->address }}</p>
                            <p class="text-gray-500">{{ $defaultAddress->receiver_name }} |
                                {{ $defaultAddress->receiver_phone }}</p>
                            <button class="text-blue-500 hover:text-blue-700 font-medium" id="changeAddressBtn">Thay đổi địa
                                chỉ</button>
                        </div>




                        <!-- Modal cho lựa chọn địa chỉ mới -->
                        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden"
                            id="addressModal">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                <h3 class="text-lg font-semibold mb-4">Chọn địa chỉ mới</h3>
                                <select id="newAddressId"
                                    class="w-full border-gray-300 border rounded-lg p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">-- Chọn địa chỉ mới --</option>
                                    @foreach ($addresses as $address)
                                        <option value="{{ $address->user_address_id }}">
                                            {{ $address->address }} - {{ $address->receiver_name }} -
                                            {{ $address->receiver_phone }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="flex justify-between space-x-2">
                                    <button class="flex-1 bg-gray-300 text-gray-700 py-2 px-3 rounded-lg hover:bg-gray-400"
                                        id="cancelAddressBtn">Hủy</button>
                                    <button class="flex-1 bg-blue-500 text-white py-2 px-3 rounded-lg hover:bg-blue-600"
                                        id="saveAddressBtn">Lưu</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- Đơn hàng của bạn -->
                <div>
                    <h2 class="text-xl font-bold mb-4">ĐƠN HÀNG CỦA BẠN</h2>
                    <div class="border border-gray-500 rounded-lg p-4 space-y-4">
                        <!-- Sản phẩm -->
                        @foreach ($cartItem as $item)
                            @foreach ($products as $product)
                                @if ($item->product_id == $product->product_id)
                                    <div class="flex justify-between">
                                        <div>
                                            <p>{{ $product->product_name }}</p>
                                            <span class="text-gray-500">x{{ $item->quantity }}</span>
                                        </div>
                                        <p>{{ number_format($item->price, 0, ',', '.') }}đ</p>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                        <div class="flex justify-between border-t border-gray-300 pt-2">
                            <span class="font-semibold">Tạm tính</span>
                            <span>{{ number_format($total, 0, ',', '.') }}đ</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-semibold">Giao hàng</span>
                            <span>0đ</span>
                        </div>
                        <div class="flex justify-between font-bold text-lg">
                            <span>Tổng</span>
                            <span>{{ number_format($total, 0, ',', '.') }}đ</span>
                        </div>

                        {{-- input ẩn gửi lên serv --}}
                        <input type="hidden" name="user_address_id" value="{{ $defaultAddress->user_address_id }}">
                        <input type="hidden" name="cartItem" value="{{ json_encode($cartItem) }}">
                        <input type="hidden" name="total" value="{{ $total }}">


                        <!-- Phương thức thanh toán -->
                        <div class="space-y-2">
                            <div>
                                <input type="radio" id="cod" name="payment_method" value="cod" class="mr-2" checked>
                                <label for="cod">Thanh toán khi nhận hàng</label>
                            </div>
                            <div>
                                <input type="radio" id="bank" name="payment_method" value="bank" class="mr-2">
                                <label for="bank">Chuyển khoản ngân hàng</label>
                            </div>
                        </div>

                        <button class="w-full bg-black text-white font-bold py-2 rounded-lg hover:bg-gray-800">
                            ĐẶT HÀNG
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('addressModal');
                const changeAddressBtn = document.getElementById('changeAddressBtn');
                const saveAddressBtn = document.getElementById('saveAddressBtn');
                const cancelAddressBtn = document.getElementById('cancelAddressBtn');
                const addressSelect = document.getElementById('newAddressId');

                // Hiện modal
                changeAddressBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    modal.classList.remove('hidden');
                });

                // Hủy thao tác
                cancelAddressBtn.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });

                // Gọi API để lưu địa chỉ mới và cập nhật giao diện
                saveAddressBtn.addEventListener('click', function() {
                    const selectedAddressId = addressSelect.value;

                    if (!selectedAddressId) {
                        alert('Vui lòng chọn địa chỉ!');
                        return;
                    }

                    fetch('/update-shipping-address', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                user_address_id: selectedAddressId,
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Cập nhật địa chỉ thành công!');
                                modal.classList.add('hidden');

                                // Fetch thông tin mới và cập nhật giao diện
                                return fetch('/get-current-shipping-address');
                            } else {
                                alert('Có lỗi xảy ra!');
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data && data.address) {
                                // document.getElementById('currentAddressDisplay').innerText = data.address;
                                // document.querySelector('#currentAddress').querySelectorAll('p')[1]
                                //     .innerText = `${data.receiver_name} | ${data.receiver_phone}`;
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Không thể cập nhật địa chỉ');
                        });
                });
            });
        </script>

    @endsection
