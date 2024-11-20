@extends('admin.layout.layout');

@section('title', 'Chỉnh sửa danh mục sản phẩm')

@section('content')
    <h1 class="font-bold text-blue-800 text-2xl border-b-2 border-b-blue-800 uppercase text-center pb-3">Chỉnh sửa danh mục sản phẩm</h1>
    <div class="mt-8">
        <form action="{{ route('admin.productCategory.edit', ['id' => $categorys->product_category_id]) }}" method="POST">
            @csrf       
            @method('PATCH')
            <div class="">
                <label class="text-xl font-bold" for="">Tiêu đề</label> <br>
                <input class="w-full py-3 outline-none pl-5 border-collapse border-indigo-300 border mt-4" type="text" name="product_category_name" value="{{ $categorys->product_category_name }}">
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="">Danh mục cha</label> <br>
                <select class="parent_id w-full py-2 outline-none border-indigo-300 border pl-4 mt-4" name="parent_id">
                    <option selected value="">-- Chọn danh mục --</option>
                    @foreach ($allCategorys as $category)
                        <option value="{{ $category->product_category_id }}" 
                        @if ($category->product_category_name == $categorys->parent_id)
                        selected
                        @endif>
                            {{ $category->product_category_name }}
                        </option>
                    @endforeach                                         
                </select>
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold" for="">Mô tả</label> <br>
                <textarea rows="5px" cols="150px" class="outline-none border-indigo-300 border mt-4 pl-4 pt-2" name="description">{{ $categorys->description }}</textarea>
            </div>
            <div class="mt-6">
                <label class="text-xl font-bold">Trạng thái</label>
                <div class="mt-4">
                    <input type="radio" name="status" id="active" value="active" @checked($categorys->status == "active")>
                    <label class="text-xl mr-6" for="status">Hoạt động</label>
                    <input type="radio" name="status" id="inactive" value="inactive" @checked($categorys->status == "inactive")>
                    <label class="text-xl" for="status">Dừng hoạt động</label>
                </div>
            </div>
            <div class="mt-6">
                <button class="px-6 py-4 bg-blue-600 rounded-xl text-white text-xl font-bold italic hover:bg-slate-500" type="submit">SỬA</button>
            </div>

        </form>
    </div>

@endsection


