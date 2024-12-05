<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class articleCategoryController extends Controller
{
    // [GET] /admin/pages/articleCategory/index
    public function index(Request $request)
    {
        return view('admin.pages.article-category.index');
    }
}
