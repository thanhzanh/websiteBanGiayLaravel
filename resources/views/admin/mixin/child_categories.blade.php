
{{-- Hien thị danh mục cha con --}}
@foreach ($categories as $category)
    <option value="{{ $category->product_category_id }}">
        {{ $prefix }} {{ $category->product_category_name }}
    </option>
    {{-- Đệ quy hiển thị danh mục con nếu có --}}
    @if ($category->children->isNotEmpty())
        @include('admin.mixin.child_categories', [
            'categories' => $category->children,
            'prefix' => $prefix . '--',
        ])
    @endif
@endforeach


