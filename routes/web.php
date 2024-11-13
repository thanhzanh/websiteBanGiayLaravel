<?php

use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\productCategoryController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Client\product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// sidebar
function setActive($route) {
    if(is_array($route)) { 
        return in_array(Request(), $route) ? 'active' : '';
    }
    return Request::path()  == $route ? 'active' : '';
}

// ==================================== FONTEND ==========================================

Route::get('/', function () {
    return view('client.pages.home.index');
});

Route::get('/product', [product::class, 'index'])->name('product');



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




