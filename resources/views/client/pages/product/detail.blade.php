@extends('client.layouts.detail')

@section('main')
    {{-- @foreach ($sp as $item) --}}
    <div class="content">
        <div class="pl-[150px] pt-[30px]">
            <a href="">Trang chủ /</a> <a href="">Sản Phẩm /</a> <a href="">Sản Phẩm /</a> <a
                href="">Sản Phẩm</a>
        </div>

        <div class="flex">
            <div class="w-1/2 pl-[80px] flex justify-center items-center relative">
                <div class="w-1/5 p-0 m-0">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2024/11/4-430x430.jpg.avif" alt="">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2024/11/5-150x150.jpg.avif" alt="">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2024/11/6-150x150.jpg.avif" alt="">
                </div>
                <div>
                    <img class="w-[100%]" src="https://saigonsneaker.com/wp-content/uploads/2024/11/4-430x430.jpg"
                        alt="">
                    <div
                        class="bg-red-600 text-white text-xs font-bold px-2 py-1 mt-8 mr-[50px] inline-block rounded-tl-md rounded-br-md absolute top-2 right-2">
                        NEW
                    </div>
                </div>

            </div>

            <div class="w-1/2">

                <div class="title flex justify-between">
                    <div class="font-bold text-[25px] pt-[10px]">New Balance 574 Rain Cloud Maple</div>
                    <div class="pr-[100px]">
                        <a href="">
                            <img class="w-[100px] hover:border hover:border-solid hover:border-gray-500"
                                src="https://saigonsneaker.com/wp-content/uploads/2022/10/giay-new-balance.jpg.avif"
                                alt="">
                        </a>
                    </div>
                </div>


                <div class="price">
                    <p class="font-bold text-[17px] text-black mt-2">1,895,000₫</p>
                </div>


                <div class="size pt-7 flex">
                    <div class="font-bold text-[20px] pt-[15px] pr-[12px]">Size:</div>
                    <div class="flex flex-wrap gap-3 mt-2">

                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-semibold hover:text-white hover:bg-black transition duration-300">
                            36
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-semibold hover:text-white hover:bg-black transition duration-300">
                            37
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-semibold hover:text-white hover:bg-black transition duration-300">
                            38
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-semibold hover:text-white hover:bg-black transition duration-300">
                            39
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-semibold hover:text-white hover:bg-black transition duration-300">
                            40
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-semibold hover:text-white hover:bg-black transition duration-300">
                            41
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-semibold hover:text-white hover:bg-black transition duration-300">
                            42
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-semibold hover:text-white hover:bg-black transition duration-300">
                            43
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-semibold hover:text-white hover:bg-black transition duration-300">
                            44
                        </a>
                        <a href="#"
                            class="w-12 h-12 flex items-center justify-center bg-white border border-gray-300 rounded-full text-black font-semibold hover:text-white hover:bg-black transition duration-300">
                            45
                        </a>

                    </div>
                </div>


                <div class="btn mt-6">
                    <a class="bg-black text-white font-bold py-3 px-6 rounded-full inline-block hover:bg-gray-800 transition duration-300"
                        href="">
                        THÊM VÀO GIỎ HÀNG
                    </a>
                </div>


                <div class="delivery-info mt-8 text-gray-600 text-sm">
                    <p>🚚 Miễn phí vận chuyển toàn quốc cho đơn hàng trên 1tr.</p>
                    <p>⚡ Giao nhanh 2h trong nội thành HCM.</p>
                    <p>⏰ Thời gian vận chuyển trung bình 3-4 ngày.</p>
                </div>


                <div class="store-info mt-6 border-dotted border-2 border-gray-300 p-4">
                    <p class="font-bold">Visit our store in HCM city</p>
                    <p class="font-semibold">ĐỊA CHỈ:</p>
                    <p>Phone: 0903 150 443</p>
                    <p>48B Thạch Thị Thanh, Tân Định, HCM.</p>
                    <a href="#" class="text-blue-500 underline">Google map</a>
                </div>
            </div>

        </div>
    </div>
    {{-- @endforeach --}}
@endsection
