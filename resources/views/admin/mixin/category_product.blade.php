{{-- Hien thị danh mục cha con --}}
@foreach ($category->children as $child)
    <option value="{{ $child->product_category_id }}" 
        @if ($child->product_category_id == $products->product_category_id) selected @endif>
        {{ $prefix }} {{ $child->product_category_name }}
    </option>

    {{-- Đệ quy hiển thị danh mục con của danh mục con --}}
    @if ($child->children->isNotEmpty())
        @include('admin.mixin.category_product', [
            'category' => $child,
            'prefix' => $prefix . '--',
        ])
    @endif
@endforeach