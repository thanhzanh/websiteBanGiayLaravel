<header>
    <div class="main-header">
        <div class="header-contact max-w-screen-xl mx-auto">
            <div class="container">
                <div class="text-center py-2">
                    <strong>Hotline: 0903.150.443 Free Ship cho đơn hàng trên 1tr đồng</strong>
                </div>
            </div>
        </div>
        <div class="header-general bg-[rgba(13,13,13,1)]">`
            <div class="header-general-main max-w-screen-xl mx-auto flex flex-wrap justify-between">
                <div class="inner-logo my-auto">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2022/02/new-logo-ss-2021-1-150x63.png.avif"
                        alt="logo">
                </div>
                <div class="inner-search justify-center flex-1 mx-20">
                    <form action="{{ route('search') }}" method="GET" class="my-5 flex">
                        <input class="py-3 pl-5 rounded-3xl min-w-full relative" type="text" name="tensanpham"
                            placeholder="Nhập từ khóa ..." value="">
                        <button type="submit" class="text-white text-xl">
                            <i class="text-black text-2xl px-2 fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="inner-user-cart text-white flex justify-end my-auto px-6 items-center">
                    <div class="my-account h-auto p-4 mx-2">
                        <a class="text-3xl" href="{{ route('login') }}"><i class="fa-solid fa-user"></i></a>
                    </div>
                    <div class="my-cart h-auto p-4 mx-2">
                        <a class="text-3xl" href=""><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav bg-slate-800 h-14 mt-3 flex items-center justify-center">
            <nav>
                <ul class="flex space-x-8 px-6 py-4">
                    <li>
                        <a href="{{ route('home') }}"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">
                            Trang Chủ
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{ route('product') }}"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">
                            Sản Phẩm
                        </a>
                        <!-- Menu cấp 2 -->
                        <ul
                            class="absolute left-0 mt-2 w-[150px] bg-gray-800 shadow-lg rounded-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-300 z-10">
                            <li><a href="{{ route('products.filterByCategory', ['id' => 4]) }}"
                                    class="block px-4 py-4 text-white hover:bg-green-500 hover:text-white rounded-t-lg transition">
                                    Nike
                                </a></li>
                            <li><a href="{{ route('products.filterByCategory', ['id' => 5]) }}"
                                    class="block px-4 py-4 text-white hover:bg-green-500 hover:text-white transition">
                                    Vans
                                </a></li>
                            <li><a href="{{ route('products.filterByCategory', ['id' => 1]) }}"
                                    class="block px-4 py-4 text-white hover:bg-green-500 hover:text-white transition">
                                    Adidas
                                </a></li>
                            <li><a href="{{ route('products.filterByCategory', ['id' => 7]) }}"
                                    class="block px-4 py-4 text-white hover:bg-green-500 hover:text-white transition">
                                    Converse
                                </a></li>
                            <li><a href="{{ route('products.filterByCategory', ['id' => 'mcqueen']) }}"
                                    class="block px-4 py-4 text-white hover:bg-green-500 hover:text-white transition">
                                    McQueen
                                </a></li>
                            <li><a href="{{ route('products.filterByCategory', ['id' => 'balenciaga']) }}"
                                    class="block px-4 py-4 text-white hover:bg-green-500 hover:text-white rounded-b-lg transition">
                                    Balenciaga
                                </a></li>
                        </ul>
                    </li>
                    <li><a href="#"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">Bài
                            Viết</a></li>
                    <li><a href="#"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">Hỗ
                            Trợ</a></li>
                    <li><a href="#contact"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">Liên
                            Hệ</a></li>
                    <li><a href="{{ route('gioithieu') }}"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">Giới
                            Thiệu</a></li>
                    <li><a href="#"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">Khuyến
                            Mãi</a></li>
                    <li><a href="#"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">Tin
                            Tức</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
