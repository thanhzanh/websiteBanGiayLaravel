<?php

use App\Http\Controllers\Admin\accountController;
use App\Http\Controllers\Admin\articleCategoryController;
use App\Http\Controllers\Admin\articleController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\forgotPasswordController;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\ordersController;
use App\Http\Controllers\Admin\productCategoryController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Client\brandClientController;
use App\Http\Controllers\Client\cartClientController;
use App\Http\Controllers\Client\forgotPasswordClientController;
use App\Http\Controllers\Client\homeClientController;
use App\Http\Controllers\Client\loginClientController;
use App\Http\Controllers\Client\orderClientController;
use App\Http\Controllers\Client\paymentClientController;
use App\Http\Controllers\Client\productClientController;
use App\Http\Controllers\Client\userAddressClientController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckSessionMiddleware;
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

// function setActive($route)
// {
//     $currentPath = Request::path();

//     if (is_array($route)) {
//         foreach ($route as $r) {
//             if (str_starts_with($currentPath, $r)) {
//                 return 'active';
//             }
//         }
//     } else {
//         if (str_starts_with($currentPath, $route)) {
//             return 'active';
//         }
//     }
//     return '';
// }


// Khi người dùng nhập 1 đường dẫn url không hợp lệ
Route::fallback(function () {
    return response()->view('client.error.404', [], 404);
});

// ==================================== FONTEND ==========================================

// Trang Home
Route::get('/', [homeClientController::class, 'index'])->name('home')->middleware(CheckSessionMiddleware::class);

// //Menu 
Route::get('/product/category/{slug}', [homeClientController::class, 'filterByCategory'])->name('products.filterByCategory');

//Trang Product
Route::get('/product', [productClientController::class, 'index'])->name('product')->middleware(CheckSessionMiddleware::class);

//Trang chi tiết sản phẩm
Route::get('product/{id}', [productClientController::class, 'detail'])->name('product.detail')->middleware(CheckSessionMiddleware::class);


//Trang bài viết
Route::get('/baiviet', function () {
    return view('client.pages.artice.index');
})->name('baiviet')->middleware(CheckSessionMiddleware::class);

//Trang liên hệ
Route::get('/lienhe', function () {
    return view('client.pages.lienhe.index');
})->name('lienhe');

//Trang giới thiệu
Route::get('/gioithieu', function () {
    return view('client.pages.gioithieu.index');
})->name('gioithieu')->middleware(CheckSessionMiddleware::class);


// Thương Hiệu
Route::get('product/brand', [brandClientController::class, 'index'])->name('product.brand')->middleware(CheckSessionMiddleware::class);

// Trang login
Route::get('/login', [loginClientController::class, 'login'])->name('login');

// Trang sign up 
Route::get('/signup', [loginClientController::class, 'signup'])->name('signup');

// Tìm kiếm sản phẩm
Route::get('/search', [productClientController::class, 'searchProduct'])->name('search')->middleware(CheckSessionMiddleware::class);

//Lọc theo giá
Route::get('/products/price/{min}/{max}', [productClientController::class, 'filterByPrice'])->name('products.filterByPrice')->middleware(CheckSessionMiddleware::class);

// Lọc theo Brand
Route::get('/product/brand/{slug}', [productClientController::class, 'filterByCategory'])->name('products.filterByCategory')->middleware(CheckSessionMiddleware::class);

// Lọc theo nổi bật
Route::get('/product/featured/{slug}', [productClientController::class, 'filterByFeatured'])->name('products.filterByFeatured')->middleware(CheckSessionMiddleware::class);


Route::get('/products/featuredprice', [productClientController::class, 'filterByPriceSort'])->name('product.filterByPriceSort')->middleware(CheckSessionMiddleware::class);

Route::get('/products/filter', [productClientController::class, 'filterByCategoryAndPrice'])->name('products.filterByCategoryAndPrice')->middleware(CheckSessionMiddleware::class);

// Route::get('/api/users', [productClientController::class, 'fetchUsers'])->middleware(CheckSessionMiddleware::class);

// ========================= account(user) ===========================

Route::get('/account/login', [loginClientController::class, 'login'])->name('account.login')->middleware(CheckSessionMiddleware::class);

Route::post('/account/login', [loginClientController::class, 'loginPost'])->name('account.login');

Route::get('/account/signup', [loginClientController::class, 'signup'])->name('account.signup')->middleware(CheckSessionMiddleware::class);

Route::post('/account/signup', [loginClientController::class, 'signupPost'])->name('account.signup');

Route::get('/account/logout', [loginClientController::class, 'logout'])->name('account.logout');

Route::get('/account/profile', [loginClientController::class, 'profile'])->name('account.profile')->middleware(CheckSessionMiddleware::class);

Route::put('/account/profile/{id}', [loginClientController::class, 'profilePost'])->name('account.profile.update');

// ========================= account(user) forgot-password ===========================

Route::get('/account/forgot-password', [forgotPasswordClientController::class, 'emailSend'])->name('account.forgot-password.request');

Route::post('/account/forgot-password', [forgotPasswordClientController::class, 'sendResetPassLinkEmail'])->name('forgot-password');

Route::get('/account/reset-password/{token}', [forgotPasswordClientController::class, 'resetPassword'])->name('account.reset-password');

Route::post('/account/reset-password/{token}', [forgotPasswordClientController::class, 'checkResetPassword'])->name('account.reset-password');


// ========================= address ===========================

Route::get('/account/addresses', [userAddressClientController::class, 'index'])->name('account.addresses.index')->middleware(CheckSessionMiddleware::class);

Route::post('/account/addresses/add', [userAddressClientController::class, 'addAddress'])->name('account.addresses.addAddress');

Route::patch('/account/addresses/update/{id}', [userAddressClientController::class, 'updatePatch'])->name('account.addresses.update');

Route::delete('/account/addresses/delete/{id}', [userAddressClientController::class, 'delete'])->name('account.addresses.delete');

Route::delete('/account/addresses/delete/{id}', [userAddressClientController::class, 'delete'])->name('account.addresses.delete');

Route::patch('/account/addresses/{id}', [userAddressClientController::class, 'setDefault'])->name('account.addresses.setDefault');

Route::post('/update-shipping-address', [userAddressClientController::class, 'updateShippingAddress'])->name('update.shipping');

Route::get('/get-current-shipping-address', [userAddressClientController::class, 'getCurrentShippingAddress']);


// ========================= payment ===========================

Route::get('/payment/{order_id}', [paymentClientController::class, 'createPayment'])->name('payment.create');

Route::get('/vnpay-return', [paymentClientController::class, 'vnpayReturn'])->name('vnpay.return');

// ========================= cart ===========================

Route::get('/cart', [cartClientController::class, 'index'])->name('cart.index')->middleware(CheckSessionMiddleware::class);

Route::post('/cart/add/{id}', [cartClientController::class, 'addPost'])->name('cart.add');

Route::delete('/cart/delete/{id}', [cartClientController::class, 'delete'])->name('cart.delete');

Route::get('/cart/update/{quantityCart}/{productId}', [cartClientController::class, 'update'])->name('cart.update');


// ========================= order ===========================
Route::get('/order/check-out', [orderClientController::class, 'checkout'])->name('order.check-out.index')->middleware(CheckSessionMiddleware::class);

Route::post('/order/create-order', [orderClientController::class, 'createOrder'])->name('order.create-order')->middleware(CheckSessionMiddleware::class);

Route::get('/order', [orderClientController::class, 'orderIndex'])->name('order.index')->middleware(CheckSessionMiddleware::class);

Route::get('/order/detail/{id}', [orderClientController::class, 'detail'])->name('order.detail')->middleware(CheckSessionMiddleware::class);



// ==================================== BACKEND ==========================================

// ========================= login ===========================

Route::get('/admin', [loginController::class, 'login'])->name('admin');

Route::post('/admin/home', [loginController::class, 'dashboard'])->name('admin.home');

Route::get('/admin/logout', [loginController::class, 'logout'])->name('admin.logout');

Route::middleware(AdminMiddleware::class)->group(function () {

    Route::get('/admin/home', [dashboardController::class, 'homeDashboard'])->name('admin.home');

    // ========================= forgot password ===========================
    Route::get('/admin/forgot-password', [forgotPasswordController::class, 'emailSend'])->name('admin.forgot-password.request');

    Route::post('/admin/forgot-password', [forgotPasswordController::class, 'sendResetPassLinkEmail'])->name('admin.forgot-password.linkEmail');

    Route::get('/admin/reset-password/{token}', [forgotPasswordController::class, 'resetPassword'])->name('admin.reset-password');

    Route::post('/admin/reset-password/{token}', [forgotPasswordController::class, 'checkResetPassword'])->name('admin.reset-password');



    // ========================= product ===========================

    Route::get('/admin/product', [productController::class, 'index'])->name('admin.product')->middleware(AdminMiddleware::class);

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

    Route::patch('/admin/account/edit/{id}', [accountController::class, 'editPost'])->name('admin.account.edit');

    Route::delete('/admin/account/delete/{id}', [accountController::class, 'delete'])->name('admin.account.delete');


    // ========================= orders ===========================

    Route::get('/admin/order', [ordersController::class, 'index'])->name('admin.order.index');

    Route::post('/admin/order/updateStatus/{id}', [ordersController::class, 'updateStatus'])->name('admin.order.updateStatus');

    Route::get('/admin/order/detail/{id}', [ordersController::class, 'detail'])->name('admin.order.detail');


    // ========================= user ===========================


    Route::get('/admin/user', [userController::class, 'index'])->name('admin.user.index');

    Route::get('/admin/user/detail/{user_id}', [userController::class, 'detail'])->name('admin.user.detail');

    Route::get('/admin/user/add/', [userController::class, 'add'])->name('admin.user.add');

    Route::post('/admin/user/add/', [userController::class, 'addPost'])->name('admin.user.add');

    Route::get('/admin/user/edit/{user_id}', [userController::class, 'edit'])->name('admin.user.edit');

    Route::patch('/admin/user/edit/{user_id}', [userController::class, 'editPatch'])->name('admin.user.edit');

    Route::delete('/admin/user/delete/{user_id}', [userController::class, 'delete'])->name('admin.user.delete');

    Route::patch('/admin/user/change-status/{id}', [userController::class, 'changeStatus'])->name('admin.user.changeStatus');
});
