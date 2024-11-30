<?php

use App\Http\Controllers\Admin\accountController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\forgotPasswordController;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\productCategoryController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Client\brandClientController;
use App\Http\Controllers\Client\homeClientController;
use App\Http\Controllers\Client\loginClientController;
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
Route::get('product/{slug}', [productClientController::class, 'detail'])->name('product.detail');


//Trang bài viết
Route::get('/baiviet', function () {
    return view('client.pages.baiviet.index');
})->name('baiviet');

//Trang liên hệ
Route::get('/lienhe', function () {
    return view('client.pages.lienhe.index');
})->name('lienhe');

//Trang giới thiệu
Route::get('/gioithieu', function () {
    return view('client.pages.gioithieu.index');
})->name('gioithieu');

//Trang khuyến mãi
Route::get('/khuyenmai', function () {
    return view('client.pages.khuyenmai.index');
})->name('khuyenmai');

//Trang khuyến mãi
Route::get('/tintuc', function () {
    return view('client.pages.tintuc.index');
})->name('tintuc');


// Thương Hiệu
Route::get('product/brand', [brandClientController::class, 'index'])->name('product.brand');

// Trang login
Route::get('/login', [loginClientController::class, 'login'])->name('login');

// Trang sign up 
Route::get('/signup', [loginClientController::class, 'signup'])->name('signup');

// Tìm kiếm sản phẩm
Route::get('/search', [productClientController::class, 'searchProduct'])->name('search');

//Lọc theo giá
Route::get('/products/price/{min}/{max}', [ProductClientController::class, 'filterByPrice'])->name('products.filterByPrice');

// Lọc theo Brand
Route::get('/product/brand/{id}', [productClientController::class, 'filterByCategory'])->name('products.filterByCategory');

// Lọc theo nổi bật
Route::get('/product/featured/{slug}', [productClientController::class, 'filterByFeatured'])->name('products.filterByFeatured');






// ==================================== BACKEND ==========================================

// ========================= login ===========================

Route::get('/admin', [loginController::class, 'login'])->name('admin');

Route::get('/admin/logout', [loginController::class, 'logout'])->name('admin.logout');

Route::post('/admin/home', [loginController::class, 'dashboard'])->name('admin.home');

Route::get('/admin/home', [dashboardController::class, 'homeDashboard'])->name('admin.home');

// ========================= forgot password ===========================
Route::get('/admin/forgot-password', [forgotPasswordController::class, 'emailSend'])->name('admin.forgot-password.request');

Route::post('/admin/forgot-password', [forgotPasswordController::class, 'sendResetPassLinkEmail'])->name('admin.forgot-password.linkEmail');

Route::get('/admin/reset-password/{token}', [forgotPasswordController::class, 'resetPassword'])->name('admin.reset-password');

Route::post('/admin/reset-password/{token}', [forgotPasswordController::class, 'checkResetPassword'])->name('admin.reset-password');



// ========================= product ===========================

Route::get('/admin/product', [productController::class, 'index'])->name('admin.product');

Route::get('/admin/product/create', [productController::class, 'create'])->name('admin.product.create');

Route::post('/admin/product/create', [productController::class, 'createPost'])->name('admin.product.create');

Route::get('/admin/product/detail/{id}', [productController::class, 'detail'])->name('admin.product.detail');

Route::get('/admin/product/edit/{id}', [productController::class, 'edit'])->name('admin.product.edit');

Route::patch('/admin/product/edit/{id}', [productController::class, 'editPatch'])->name('admin.product.edit');

Route::delete('/admin/product/delete/{id}', [productController::class, 'delete'])->name('admin.product.delete');

Route::patch('/admin/product/change-status/{id}', [productController::class, 'changeStatus'])->name('admin.product.changeStatus');



// ========================= product category ===========================

Route::get('/admin/product-category', [productCategoryController::class, 'index'])->name('admin.productCategory');

Route::get('/admin/product-category/create', [productCategoryController::class, 'create'])->name('admin.productCategory.create');

Route::post('/admin/product-category/create', [productCategoryController::class, 'createPost'])->name('admin.productCategory.createPost');

Route::get('/admin/product-category/detail/{id}', [productCategoryController::class, 'detail'])->name('admin.productCategory.detail');

Route::get('/admin/product-category/edit/{id}', [productCategoryController::class, 'edit'])->name('admin.productCategory.edit');

Route::patch('/admin/product-category/edit/{id}', [productCategoryController::class, 'editPatch'])->name('admin.productCategory.edit');

Route::delete('/admin/product-category/delete/{id}', [productCategoryController::class, 'delete'])->name('admin.productCategory.delete');

Route::patch('/admin/product-category/change-status/{id}', [productCategoryController::class, 'changeStatus'])->name('admin.productCategory.changeStatus');


// ========================= account admin ===========================

Route::get('/admin/account', [accountController::class, 'index'])->name('admin.account');

Route::get('/admin/account/create', [accountController::class, 'create'])->name('admin.account.create');

Route::post('/admin/account/create', [accountController::class, 'createPost'])->name('admin.account.create');

Route::get('/admin/account/detail/{id}', [accountController::class, 'detail'])->name('admin.account.detail');

Route::get('/admin/account/edit/{id}', [accountController::class, 'edit'])->name('admin.account.edit');

Route::post('/admin/account/edit/{id}', [accountController::class, 'editPost'])->name('admin.account.edit');

Route::delete('/admin/account/delete/{id}', [accountController::class, 'delete'])->name('admin.account.delete');



