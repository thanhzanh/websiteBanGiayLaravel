<?php

use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\productCategoryController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Client\homeClientController;
use App\Http\Controllers\Client\productClientController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// sidebar
function setActive($route)
{
    if (is_array($route)) {
        return in_array(Request(), $route) ? 'active' : '';
    }
    return Request::path()  == $route ? 'active' : '';
}

// ==================================== FONTEND ==========================================

// Trang Home
Route::get('/', [homeClientController::class, 'index'])->name('home');

//Trang Product
Route::get('/product', [productClientController::class, 'index'])->name('product');

//Trang chi tiết sản phẩm
Route::get('/product/detail', [productClientController::class, 'detail'])->name('product.detail');

// Route::get('/product/detail/{id}', [productClientController::class, 'detail'])->name('product.detail');

// Trang Bài Viết
Route::get('article', function () {
    return view('client.pages.article.index');
});

// ==================================== BACKEND ==========================================
Route::get('/admin', [loginController::class, 'login'])->name('admin');

Route::get('/admin/logout', [loginController::class, 'logout'])->name('admin.logout');

Route::post('/admin/home', [loginController::class, 'dashboard'])->name('admin.home');

Route::get('/admin/home', [dashboardController::class, 'homeDashboard'])->name('admin.home');

// ========================= product ===========================

Route::get('/admin/product', [productController::class, 'index'])->name('admin.product');

Route::get('/admin/product/add', [productController::class, 'create'])->name('admin.product.create');

// ========================= product category ===========================

Route::get('/admin/product-category', [productCategoryController::class, 'index'])->name('admin.productCategory');

Route::get('/admin/product-category/create', [productCategoryController::class, 'create'])->name('admin.productCategory.create');

Route::post('/admin/product-category/create', [productCategoryController::class, 'createPost'])->name('admin.productCategory.createPost');

Route::get('/admin/product-category/detail/{id}', [productCategoryController::class, 'detail'])->name('admin.productCategory.detail');

Route::get('/admin/product-category/edit/{id}', [productCategoryController::class, 'edit'])->name('admin.productCategory.edit');

Route::patch('/admin/product-category/edit/{id}', [productCategoryController::class, 'editPatch'])->name('admin.productCategory.edit');

Route::delete('/admin/product-category/delete/{id}', [productCategoryController::class, 'delete'])->name('admin.productCategory.delete');

Route::get('/admin/product-category/search', [productCategoryController::class, 'search'])->name('admin.productCategory.search');

Route::patch('/admin/product-category/change-status/{id}', [productCategoryController::class, 'changeStatus'])->name('admin.productCategory.changeStatus');
