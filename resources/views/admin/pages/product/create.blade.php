@extends('admin.layout.layout');

@section('title', 'Thêm sản phẩm')

@section('content')
    <h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Thêm sản phẩm</h1>
    <div class="mt-8">
        <form action="{{ route('admin.product.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between">
                <div class="mr-8">
                    <div class="">
                        <label class="text-xl font-bold" for="product_name">Tên sản phẩm</label> <br>
                        <input
                            class="w-full py-3 outline-none pl-5 rounded-xl border-collapse border-indigo-300 border mt-4"
                            type="text" name="product_name">
                    </div>
                    <div class="mt-6 w-3/4">
                        <label class="text-xl font-bold" for="featured">Nổi bật</label>
                        <div class="mt-4">
                            <input type="radio" name="featured" id="featured1" value="1">
                            <label class="text-xl mr-6" for="featured1">Nổi bật</label>
                            <input type="radio" name="featured" id="featured0" value="0" checked>
                            <label class="text-xl" for="featured0">Không nổi bật</label>
                        </div>
                    </div>
                    <div class="mt-6 w-3/4">
                        <label class="text-xl font-bold textarea-mce" for="description">Mô tả</label> <br>
                        <textarea id="myeditorinstance" rows="12px" cols="90px"
                            class="rounded-sm outline-none border-indigo-300 border mt-4 pl-4 pt-4" name="description"></textarea>
                    </div>

                    <div class="mt-6">
                        <label class="text-xl font-bold" for="size_id">Size</label> <br>
                        <select class="parent_id w-full py-2 outline-none border-indigo-300 border pl-4 mt-4"
                            name="size_id[]" multiple>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->size_id }}"> {{ $size->size_name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-6">
                        <label class="text-xl font-bold" for="image_id">Hình ảnh</label> <br>
                        <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4"
                            accept="image/*" type="file" name="image_id[]" multiple>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="">
                        <label class="text-xl font-bold" for="price">Giá</label> <br>
                        <input
                            class="w-full py-3 outline-none pl-5 rounded-xl border-collapse border-indigo-300 border mt-4"
                            step="0.01" type="number" name="price">
                    </div>
                    <div class="mt-6">
                        <label class="text-xl font-bold" for="quantity">Số lượng</label> <br>
                        <input
                            class="w-full py-3 outline-none pl-5 rounded-xl border-collapse border-indigo-300 border mt-4"
                            type="number" name="quantity">
                    </div>
                    <div class="mt-6">
                        <label class="text-xl font-bold" for="discount">Giảm giá %</label> <br>
                        <input
                            class="w-full py-3 outline-none pl-5 rounded-xl border-collapse border-indigo-300 border mt-4"
                            type="number" name="discount" value="0" min='0'>
                    </div>
                    <div class="mt-6">
                        <label class="text-xl font-bold" for="product_category_id ">Danh mục cha</label> <br>
                        <select class="parent_id w-full py-2 outline-none border-indigo-300 border pl-4 mt-4"
                            name="product_category_id">
                            <option selected value="">-- Chọn danh mục --</option>
                            @foreach ($categories as $category)
                                
                                <option value="{{ $category->product_category_id }}"
                                    
                                    @foreach ($products as $product)
                                        @if ($category->product_category_id == $product->product_category_id) selected @endif>
                                        {{ $category->product_category_name }}
                                    @endforeach
                                </option>

                                {{-- Hiển thị danh mục con nếu có --}}
                                @if ($category->children->isNotEmpty())
                                    @include('admin.mixin.child_categories', [
                                        'category' => $category,
                                        'prefix' => '--', // Tiền tố để hiển thị danh mục con
                                    ])
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-6">
                        <label class="text-xl font-bold" for="status">Trạng thái</label>
                        <div class="mt-4">
                            <input type="radio" name="status" id="active" value="active" checked>
                            <label class="text-xl mr-6" for="status">Hoạt động</label>
                            <input type="radio" name="status" id="inactive" value="inactive">
                            <label class="text-xl" for="status">Dừng hoạt động</label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-6">
                <button
                    class="px-4 py-3 w-full bg-blue-600 rounded-xl text-white text-xl font-bold italic hover:bg-slate-500"
                    type="submit">THÊM</button>
            </div>
        </form>
    </div>

@endsection
