<header>
    <div class="main-header">
        <div class="header-contact max-w-screen-xl mx-auto">
            <div class="container flex justify-around">
                <div class="text-center py-2">
                    <strong>Hotline: 0903.150.443 Free Ship cho đơn hàng trên 1tr đồng</strong>
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
                                class="absolute bg-slate-50 text-black shadow-lg hidden mt-2 w-[160px] menu-dropdown transition-opacity duration-300 top-[32px] right-[-53px]">
                                <li>
                                    <a href="" class="block px-4 py-2 hover:bg-gray-100">
                                        Xem thông tin
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('account.logout') }}" method="GET" class="block">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 hover:bg-gray-100">
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
                    <div title="Đăng nhập & đăng ký" class="my-account h-auto p-4 mx-2">
                        <a class="text-3xl" href="{{ route('account.login') }}"><i class="fa-solid fa-user"></i></a>
                    </div>
                    <div title="Giỏ hàng" class="my-cart h-auto p-4 mx-2 relative">
                        <a class="text-3xl" href="{{ route('cart.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <p
                            class="absolute right-0 top-0 bg-white text-black font-bold rounded-[40px] m-[-2px] px-[10px]">
                            {{ $countProduct }}</p>
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
                        <ul
                            class="absolute left-0 mt-2 w-[200px] bg-gray-800 shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-300 z-10">
                            @foreach ($categories as $category)
                                <li class="relative group">
                                    <a href="{{ route('products.filterByCategory', ['id' => $category->product_category_id]) }}"
                                        class="block px-4 py-4 text-white hover:bg-green-500 hover:text-white transition">
                                        {{ $category->product_category_name }}
                                    </a>

                                    <!-- Nếu có danh mục con, hiển thị danh mục con -->
                                    @if ($category->children->isNotEmpty())
                                        <ul
                                            class="absolute left-full top-0 mt-2 w-[200px] bg-gray-800 shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-300">
                                            @foreach ($category->children as $child)
                                                <li>
                                                    <a href="{{ route('products.filterByCategory', ['id' => $child->product_category_id]) }}"
                                                        class="block px-4 py-4 text-white hover:bg-green-500 hover:text-white transition">
                                                        {{ $child->product_category_name }}
                                                    </a>
                                                    <!-- Nếu danh mục con có danh mục con, tiếp tục đệ quy -->
                                                    @if ($child->children->isNotEmpty())
                                                        @include('client.mixins.child_categories', [
                                                            'category' => $child,
                                                        ])
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
