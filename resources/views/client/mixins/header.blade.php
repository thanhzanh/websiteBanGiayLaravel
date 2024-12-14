<header>
    <div class="main-header">
        <div class="header-contact max-w-screen-xl mx-auto">
            <div class="container flex justify-between">
                <div class="text-center text-[14px] py-2">
                    <i class="fa-solid fa-phone"></i>
                    <strong>Hotline: 0903.150.443</strong>
                </div>
                @if (session('infoUser'))
                    <div class="flex mr-2 leading-[40px]">
                        <div class="relative">
                            <div class="flex items-center cursor-pointer toggle-menu">
                                <p class="text-[18px] font-serif">{{ session('infoUser')->user_name }}</p>
                                <span title="Cài đặt" class="ml-4 text-[18px]">
                                    <i class="fa-solid fa-caret-down"></i>
                                </span>
                            </div>
                            <!-- Menu thả xuống -->
                            <ul
                                class="absolute bg-slate-50 text-black shadow-lg hidden mt-2 w-[180px] menu-dropdown transition-opacity duration-300 z-[999] top-[32px] right-0">
                                <li>
                                    <a href="{{ route('account.profile') }}" class="block px-4 py-2 hover:bg-gray-100">
                                        <i class="fa-solid fa-pen"></i>
                                        Thông tin cá nhân
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('account.addresses.index') }}" class="block px-4 py-2 hover:bg-gray-100">
                                        <i class="fa-solid fa-landmark"></i>
                                        Địa chỉ
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('order.index') }}" class="block px-4 py-2 hover:bg-gray-100">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                        Đơn mua
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('account.logout') }}" method="GET" class="block">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 hover:bg-gray-100">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                            Đăng xuất
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

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
                            type="text" name="tensanpham" placeholder="Nhập từ khóa ..." value="">
                        <button type="submit"
                            class="text-black text-xl absolute right-3 top-1/2 transform -translate-y-1/2">
                            <i class="text-black text-2xl fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <div class="inner-user-cart text-white flex justify-end my-auto px-6 items-center">
                    
                    @if (session('infoUser'))
                        
                    @else
                        <div title="Đăng nhập & đăng ký" class="my-account h-auto p-4 mx-2">
                            <a class="text-3xl" href="{{ route('account.login') }}"><i class="fa-solid fa-user"></i></a>
                        </div>
                    @endif
                    <div title="Giỏ hàng" class="my-cart h-auto p-4 mx-2 relative">
                        <a class="text-3xl" href="{{ route('cart.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <p
                            class="absolute right-0 top-0 bg-white text-black font-bold rounded-[40px] m-[-2px] px-[10px]">
                            {{ $countProduct }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav bg-[rgba(13,13,13,1)] h-[50px] flex items-center justify-center">
            <nav>
                <ul class="flex px-4 py-2">
                    <li class="py-2 px-4">
                        <a href="{{ route('home') }}"
                            class="text-white font-normal uppercase text-base rounded-lg transition duration-300">
                            Trang chủ
                        </a>
                    </li>
                    <li class="py-2 px-4">
                        <a href="{{ route('gioithieu') }}"
                            class="text-white font-normal uppercase text-base rounded-lg transition duration-300">
                            Giới thiệu
                        </a>
                    </li>
                    <li class="relative group py-2 px-4">
                        <a href="{{ route('product') }}"
                            class="text-white font-normal uppercase text-base rounded-lg transition duration-300">
                            Sản phẩm
                            <i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <!-- Menu cấp 2 (Danh mục con) -->
                        <ul class="absolute left-0 mt-[10px] w-[200px] bg-white shadow-lg z-10 border-b border-gray-300 hidden group-hover:block">
                            @foreach ($categories as $category)
                                <li class="relative group">
                                    <a href=""
                                        class="block px-4 py-4 text-black bg-white hover:bg-gray-100 transition">
                                        {{ $category->product_category_name }}
                                        <!-- Hiển thị icon nếu có danh mục con -->
                                        @if ($category->children->isNotEmpty())
                                            <i class="fa-solid fa-chevron-right ml-2"></i>
                                        @endif
                                    </a>
                    
                                    <!-- Hiển thị danh mục con -->
                                    @if ($category->children->isNotEmpty())
                                        <ul class="absolute left-full top-0 mt-0 w-[200px] bg-gray-800 shadow-lg hidden group-hover:block border-b border-gray-600">
                                            @foreach ($category->children as $child)
                                                <li class="relative group">
                                                    <a href=""
                                                        class="block px-4 py-4 text-white bg-gray-800 hover:bg-gray-700 transition">
                                                        {{ $child->product_category_name }}
                                                        <!-- Hiển thị icon nếu có danh mục con -->
                                                        @if ($child->children->isNotEmpty())
                                                            <i class="fa-solid fa-chevron-right ml-2"></i>
                                                        @endif
                                                    </a>
                    
                                                    <!-- Đệ quy danh mục con -->
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
                    





                    <li class="py-2 px-4">
                        <a href="#"
                            class="text-white font-normal uppercase text-base rounded-lg transition duration-300">
                            Bài viết
                        </a>
                    </li>
                    <li class="py-2 px-4">
                        <a href="#contact"
                            class="text-white font-normal uppercase text-base rounded-lg transition duration-300">
                            Liên hệ
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<script>
    // menu account user
    document.addEventListener('DOMContentLoaded', () => {
        const toggleMenu = document.querySelector('.toggle-menu');
        const dropdownMenu = document.querySelector('.menu-dropdown');

        if (toggleMenu && dropdownMenu) {
            toggleMenu.addEventListener('click', (e) => {
                e.stopPropagation(); // Ngăn sự kiện lan ra ngoài
                dropdownMenu.classList.toggle('hidden');
            });

            // Ẩn menu nếu nhấp ra ngoài
            document.addEventListener('click', () => {
                dropdownMenu.classList.add('hidden');
            });
        }
    });
</script>
