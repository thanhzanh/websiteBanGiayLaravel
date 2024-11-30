{{-- child_categories.blade.php --}}
@foreach ($category->children as $child)
    <option value="{{ $child->product_category_id }}">
        {{ $prefix }} {{ $child->product_category_name }}
    </option>

    {{-- Nếu có danh mục con của danh mục con, tiếp tục đệ quy để hiển thị --}}
    @if ($child->children->isNotEmpty())
        @include('admin.mixin.child_categories', ['category' => $child, 'prefix' => $prefix . '--'])
    @endif
@endforeach
