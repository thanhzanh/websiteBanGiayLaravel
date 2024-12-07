<?php

namespace App\Providers;

use App\Models\CartItem;
use App\Models\ProductCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        $categories = ProductCategory::all();
        View::share('categories', $categories);

        // lấy ra số lượng sản phẩm của từng giỏ hàng
        $sessionId = session()->getId();
        $userId = session('infoUser.user_id', null);

        // nếu là khách đăng nhập
        

        $countProductInCart = DB::table('cart_items')->where('cart_id')->sum('quantity');
        View::share('countProduct', $countProductInCart);
    }
}
