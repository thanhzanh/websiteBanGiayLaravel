<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productController extends Controller
{
    // [GET] /admin/pages/product/index
    public function index() {
        return view('admin.pages.product.index');
    }



}
