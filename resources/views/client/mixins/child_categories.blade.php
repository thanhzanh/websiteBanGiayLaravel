{{-- menu cấp con --}}
<ul
    class="absolute left-full top-0 mt-0 w-[200px] bg-gray-800 shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 border-b border-gray-600">
    @foreach ($category->children as $child)
        <li class="relative group">
            <a href="{{ route('products.filterByCategory', ['id' => $child->product_category_id]) }}"
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

