<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class articleController extends Controller
{
    // [GET] /admin/pages/article/index
    public function index(Request $request)
    {
        return view('admin.pages.article.index');
    }
}
