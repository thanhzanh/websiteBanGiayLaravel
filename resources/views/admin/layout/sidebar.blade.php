<!-- sidebar -->
<div class="sidebar w-[345px] bg-[#7d908a] left-0 top-0 h-[100%] fixed">

    <div class="sidebar-brand h-[90px] pt-4 pr-0 pb-4 pl-8 text-white">
        <h2 class="inline-block text-xl font-bold pr-4">
            <span class="text-2xl"><i class="fa-brands fa-shoelace"></i></span>
            KDSNEAKER
        </h2>
    </div>

    <div class="siderbar-menu">
        <ul>
            <li class="w-[100%] mb-4 pl-8 {{ setActive('admin/home') }}">
                <a href="{{ route('admin.home') }}" class="block text-xl pl-4 text-[#ffff] ">
                    <span class="text-xl pr-5"><i class="fa-solid fa-shop"></i></span>
                    <span>Home</span>
                </a>
            </li>
            <li class="w-[100%] mb-4 pl-8 {{ setActive('admin/product-category') }}">
                <a href="{{ route('admin.productCategory') }}" class="block text-xl pl-4 text-[#ffff] {{setActive(['admin/product-category']) }}">
                    <span class="text-xl pr-5"><i class="fa-brands fa-product-hunt"></i></span>
                    <span>Product Category</span>
                </a>
            </li>
            <li class="w-[100%] mb-4 pl-8 {{ setActive('admin/product') }}">
                <a href="{{ route('admin.product') }}" class="block text-xl pl-4 text-[#ffff] {{setActive(['admin/product']) }}">
                    <span class="text-xl pr-5"><i class="fa-brands fa-product-hunt"></i></span>
                    <span>Product</span>
                </a>
            </li>
            <li class="w-[100%] mb-4 pl-8 {{ setActive('admin/order') }}">
                <a href="{{ route('admin.order.index') }}" class="block text-xl pl-4 text-[#ffff] {{setActive(['admin/order']) }}">
                    <span class="text-xl pr-5"><i class="fa-solid fa-bag-shopping"></i></span>
                    <span>Order</span>
                </a>
            </li>
            <li class="w-[100%] mb-4 pl-8">
                <a href="" class="block text-xl pl-4 text-[#ffff]">
                    <span class="text-xl pr-5"><i class="fa-solid fa-user-group"></i></span></span>
                    <span>User</span>
                </a>
            </li>
            <li class="w-[100%] mb-4 pl-8 {{ setActive('admin/account') }}">
                <a href="{{ route('admin.account') }}" class="block text-xl pl-4 text-[#ffff] {{setActive(['admin/account']) }}">
                    <span class="text-xl pr-5"><i class="fa-solid fa-user"></i></span>
                    <span>Account</span>
                </a>
            </li>
            <li class="w-[100%] mb-4 mt-4 pl-8 { setActive('admin.logout') }}">
                <a href="{{ route('admin.logout') }}" class="block text-xl pl-4 text-[#ffff] {{setActive(['admin.logout']) }}">
                    <span class="text-xl pr-5"><i class="fa-solid fa-right-from-bracket"></i></span>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- end sidebar -->