<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use League\CommonMark\Node\Block\Document;
use App\Models\Brand;

class brandClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.pages.brand.index', ['brands' => Brand::all()]);
    }

    public function getProductsByBrand($id)
    {
        $brand = Brand::where('brand_id', $id)->firstOrFail(); // Tìm thương hiệu dựa trên brand_id
        $products = Product::where('brand_id', $id)->get(); // Lấy tất cả sản phẩm thuộc thương hiệu này
        $categories = ProductCategory::all();

        return view('client.pages.brand.index', [
            'brand' => $brand,
            'products' => $products,
            'categories'=> $categories
        ]);
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}