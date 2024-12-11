@extends('client.layouts.default')

@section('title', 'Địa chỉ')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Quản Lý Địa Chỉ</h1>
        <button class="bg-black text-white right-0 px-4 py-2 rounded hover:bg-white hover:text-black mb-4"
            data-modal-toggle="addressModal">+ Thêm địa chỉ mới</button>
        @foreach ($addresses as $item)
            <div>
                <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                    <p><strong>Người nhận:</strong> {{ $item->receiver_name }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $item->receiver_phone }}</p>
                    <p><strong>Loại:</strong> {{ $item->label ?? 'Khác' }}</p>
                    <p><strong>Mặc định:</strong> {{ $item->is_default ? 'Có' : 'Không' }}</p>

                    <div class="flex gap-2 mt-4">
                        <button class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600"
                            data-modal-toggle="updateAddressModal" data-address="{{ json_encode($item) }}">
                            Cập nhật
                        </button>
                        <form action="{{ route('account.addresses.delete', ['id' => $item->user_address_id]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">Xóa</button>
                        </form>
                        <form action="{{ route('account.addresses.setDefault', $item->user_address_id) }}" method="post"
                            class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600">Thiết lập mặc
                                định</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <!-- Modal thêm-->
    <div id="addressModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
            <form action="{{ route('account.addresses.addAddress') }}" method="post">
                @csrf
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h5 class="text-xl font-bold">Địa chỉ mới</h5>
                        <button type="button" class="text-gray-500 hover:text-gray-700"
                            data-modal-hide="addressModal">&times;</button>
                    </div>
                    <div class="mb-4">
                        <label for="receiver_name" class="block text-sm font-medium">Họ và tên</label>
                        <input type="text" id="receiver_name" name="receiver_name"
                            class="w-full mt-1 border border-gray-400 py-2 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="receiver_phone" class="block text-sm font-medium">Số điện thoại</label>
                        <input type="text" id="receiver_phone" name="receiver_phone"
                            class="w-full mt-1 border border-gray-600 py-2 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium">Địa chỉ</label>
                        <textarea id="address" name="address"
                            class="w-full mt-1 border border-gray-600 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="label" class="block text-sm font-medium">Loại địa chỉ</label>
                        <select id="label" name="label"
                            class="w-full mt-1 border-gray-600 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                            <option value="Nhà riêng">Nhà riêng</option>
                            <option value="Văn phòng">Văn phòng</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="is_default" name="is_default"
                            class="w-4 h-4 mt-1 text-blue-500 border-gray-600 rounded focus:ring focus:ring-blue-200">
                        <label for="is_default" class="ml-2 text-sm">Đặt làm địa chỉ mặc định</label>
                    </div>
                </div>


                <div class="flex justify-end gap-2 p-6 border-t">
                    <button type="button" class="px-4 py-2 text-gray-500 hover:text-gray-700"
                        data-modal-hide="addressModal">Trở lại</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Hoàn
                        thành</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Cập nhật địa chỉ -->
    <div id="updateAddressModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
            <form action="" method="post" id="updateAddressForm">
                @csrf
                @method('PATCH')
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h5 class="text-xl font-bold">Cập nhật địa chỉ</h5>
                        <button type="button" class="text-gray-500 hover:text-gray-700"
                            data-modal-hide="updateAddressModal">&times;</button>
                    </div>
                    <div class="mb-4">
                        <label for="update_receiver_name" class="block text-sm font-medium">Họ và tên</label>
                        <input type="text" id="update_receiver_name" name="receiver_name"
                            class="w-full mt-1 border border-gray-400 py-2 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="update_receiver_phone" class="block text-sm font-medium">Số điện thoại</label>
                        <input type="text" id="update_receiver_phone" name="receiver_phone"
                            class="w-full mt-1 border border-gray-600 py-2 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="update_address" class="block text-sm font-medium">Địa chỉ</label>
                        <textarea id="update_address" name="address"
                            class="w-full mt-1 border border-gray-600 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="update_label" class="block text-sm font-medium">Loại địa chỉ</label>
                        <select id="update_label" name="label"
                            class="w-full mt-1 border-gray-600 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                            <option value="Nhà riêng">Nhà riêng</option>
                            <option value="Văn phòng">Văn phòng</option>
                        </select>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="update_is_default" value="1" name="is_default"
                            class="w-4 h-4 mt-1 text-blue-500 border-gray-600 rounded focus:ring focus:ring-blue-200">
                        <label for="update_is_default" class="ml-2 text-sm">Đặt làm địa chỉ mặc định</label>
                    </div>
                </div>
                <div class="flex justify-end gap-2 p-6 border-t">
                    <button type="button" class="px-4 py-2 text-gray-500 hover:text-gray-700"
                        data-modal-hide="updateAddressModal">Trở lại</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Cập
                        nhật</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        // Modal toggle logic
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const modalId = button.getAttribute('data-modal-toggle');
                document.getElementById(modalId).classList.remove('hidden');
            });
        });

        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-hide');
                document.getElementById(modalId).classList.add('hidden');
            });
        });

        // Hiển thị dữ liệu lên modal
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);

                if (button.hasAttribute('data-address')) {
                    const address = JSON.parse(button.getAttribute('data-address'));   
                    
                    console.log(address);
                    

                    document.getElementById('update_receiver_name').value = address.receiver_name;
                    document.getElementById('update_receiver_phone').value = address.receiver_phone;
                    document.getElementById('update_address').value = address.address;
                    document.getElementById('update_label').value = address.label;
                    document.getElementById('update_is_default').checked = address.is_default;

                    // Cập nhật URL form
                    const form = document.getElementById('updateAddressForm');
                    form.action = `/account/addresses/update/${address.user_address_id}`;
                }

                modal.classList.remove('hidden');
            });
        });
    </script>
@endsection
