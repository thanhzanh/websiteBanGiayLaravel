@extends('client.layouts.detail')

@section('title', 'Tiến hành thanh toán')

@section('main')
    <div class="container mx-auto p-8">
        <!-- Thông tin thanh toán -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Form thông tin -->
            <div>
                <h2 class="text-xl font-bold mb-4">THÔNG TIN THANH TOÁN</h2>
                <form class="space-y-4">
                    <div>
                        <label class="block font-semibold mb-1" for="name">Họ và tên *</label>
                        <input type="text" id="name" class="w-full border border-gray-300 rounded-lg p-2"
                            placeholder="Nhập họ và tên">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1" for="phone">Số điện thoại *</label>
                        <input type="text" id="phone" class="w-full border border-gray-300 rounded-lg p-2"
                            placeholder="Nhập số điện thoại">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1" for="email">Địa chỉ email *</label>
                        <input type="email" id="email" class="w-full border border-gray-300 rounded-lg p-2"
                            placeholder="Nhập địa chỉ email">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1" for="address">Địa chỉ *</label>
                        <input type="text" id="address" class="w-full border border-gray-300 rounded-lg p-2"
                            placeholder="Nhập địa chỉ cụ thể">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1" for="notes">Ghi chú đơn hàng (tùy chọn)</label>
                        <textarea id="notes" class="w-full border border-gray-300 rounded-lg p-2" rows="4"
                            placeholder="Ghi chú về đơn hàng..."></textarea>
                    </div>
                </form>
            </div>

            <!-- Đơn hàng của bạn -->
            <div>
                <h2 class="text-xl font-bold mb-4">ĐƠN HÀNG CỦA BẠN</h2>
                <div class="border border-gray-500 rounded-lg p-4 space-y-4">
                    <!-- Sản phẩm -->
                    <div class="flex justify-between">
                        <div>
                            <p>Giày Vans Vault Knu Skool VR3 x Imran Potato Like Auth - 40</p>
                            <span class="text-gray-500">x3</span>
                        </div>
                        <p>2.550.000đ</p>
                    </div>
                    <div class="flex justify-between">
                        <div>
                            <p>Giày Adidas Yeezy Foam Runner 'Ararat' - 36</p>
                            <span class="text-gray-500">x2</span>
                        </div>
                        <p>1.300.000đ</p>
                    </div>
                    <!-- Tạm tính -->
                    <div class="flex justify-between border-t border-gray-300 pt-2">
                        <span class="font-semibold">Tạm tính</span>
                        <span>3.850.000đ</span>
                    </div>
                    <!-- Giao hàng -->
                    <div class="flex justify-between">
                        <span class="font-semibold">Giao hàng</span>
                        <span>0đ</span>
                    </div>
                    <!-- Tổng -->
                    <div class="flex justify-between font-bold text-lg">
                        <span>Tổng</span>
                        <span>3.880.000đ</span>
                    </div>
                    <!-- Phương thức thanh toán -->
                    <div class="space-y-2">
                        <div>
                            <input type="radio" id="bank" name="payment" class="mr-2">
                            <label for="bank">Chuyển khoản ngân hàng</label>
                        </div>
                        <div>
                            <input type="radio" id="cod" name="payment" class="mr-2">
                            <label for="cod">Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                    <!-- Đặt hàng -->
                    <button href="" class="w-full bg-black text-white font-bold py-2 rounded-lg hover:bg-gray-800">
                        ĐẶT HÀNG
                    </button>


                </div>
            </div>
        </div>
    </div>



@endsection
