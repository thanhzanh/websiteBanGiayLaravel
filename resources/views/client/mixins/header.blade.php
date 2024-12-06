<header>
    <div class="main-header">
        <div class="header-contact max-w-screen-xl mx-auto">
            <div class="container">
                <div class="text-center py-2">
                    <strong>Hotline: 0903.150.443 Free Ship cho đơn hàng trên 1tr đồng</strong>
                </div>
            </div>
        </div>
        <div class="header-general bg-[rgba(13,13,13,1)]">
            <div class="header-general-main max-w-screen-xl mx-auto flex flex-wrap justify-between">
                <div class="inner-logo my-auto">
                    <img src="https://saigonsneaker.com/wp-content/uploads/2022/02/new-logo-ss-2021-1-150x63.png.avif"
                        alt="logo">
                </div>
                <div class="inner-search justify-center flex-1 mx-20">
                    <form action="{{ route('search') }}" method="GET" class="my-5 flex relative">
                        <input 
                            class="py-3 pl-5 pr-12 rounded-3xl min-w-full relative border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500" 
                            type="text" 
                            name="tensanpham" 
                            placeholder="Nhập từ khóa ..." 
                            value="">
                        <button 
                            type="submit" 
                            class="text-black text-xl absolute right-3 top-1/2 transform -translate-y-1/2">
                            <i class="text-black text-2xl fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                
                <div class="inner-user-cart text-white flex justify-end my-auto px-6 items-center">
                    {{-- <div class="flex mr-2">
                        <p class="text-[20px] font-serif">Nguyen Van A</p>
                        <span title="Cài đặt" class="ml-4 text-[20px]"><i class="fa-solid fa-gear"></i></span>
                    </div> --}}
                    <div title="Đăng nhập & đăng ký" class="my-account h-auto p-4 mx-2">
                        <a class="text-3xl" href="{{ route('account.login') }}"><i class="fa-solid fa-user"></i></a>
                    </div>
                    <div title="Giỏ hàng" class="my-cart h-auto p-4 mx-2 relative">
                        <a class="text-3xl" href="{{ route('cart.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <p class="absolute right-0 top-0 bg-white text-black font-bold rounded-[40px] m-[-2px] px-[10px]">{{ $countProduct }}</p>
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
                    <li>
                        <a href="{{ route('gioithieu') }}"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">Giới
                            Thiệu
                        </a>
                    </li>
                    <li class="relative group">
                        <a href="{{ route('product') }}"
                           class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">
                            Sản Phẩm
                        </a>
                        <!-- Menu cấp 2 (Danh mục con) -->
                        <ul class="absolute left-0 mt-2 w-[200px] bg-gray-800 shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-300 z-10">
                            @foreach ($categories as $category)
                                <li class="relative group">
                                    <a href="{{ route('products.filterByCategory', ['id' => $category->product_category_id]) }}"
                                       class="block px-4 py-4 text-white hover:bg-green-500 hover:text-white transition">
                                        {{ $category->product_category_name }}
                                    </a>
                    
                                    <!-- Nếu có danh mục con, hiển thị danh mục con -->
                                    @if ($category->children->isNotEmpty())
                                        <ul class="absolute left-full top-0 mt-2 w-[200px] bg-gray-800 shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-300">
                                            @foreach ($category->children as $child)
                                                <li>
                                                    <a href="{{ route('products.filterByCategory', ['id' => $child->product_category_id]) }}"
                                                       class="block px-4 py-4 text-white hover:bg-green-500 hover:text-white transition">
                                                        {{ $child->product_category_name }}
                                                    </a>
                                                    <!-- Nếu danh mục con có danh mục con, tiếp tục đệ quy -->
                                                    @if ($child->children->isNotEmpty())
                                                        @include('client.mixins.child_categories', ['category' => $child])
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">Bài
                            Viết
                        </a>
                    </li>
                    <li>
                        <a href="#contact"
                            class="text-white font-bold text-base py-2 px-4 hover:bg-green-500 rounded-lg transition duration-300">Liên
                            Hệ
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
