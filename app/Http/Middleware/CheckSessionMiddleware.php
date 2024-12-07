<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $infoUser = session('infoUser', null);
        $sessionId = session()->getId();

        if ($infoUser && isset($infoUser->user_id)) {
            $cart = DB::table('cart')->where('user_id', $infoUser->user_id)->first();
            $cartItems = $cart ? DB::table('cart_items')->where('cart_id', $cart->cart_id)->get() : collect();
            $countProduct = $cartItems->sum('quantity');
        } else {
            $cart = DB::table('cart')->where('session_id', $sessionId)->first();
            $cartItems = $cart ? DB::table('cart_items')->where('cart_id', $cart->cart_id)->get() : collect();
            $countProduct = $cartItems->sum('quantity');
        }

        // Chia sẻ thông tin với tất cả các view
        View::share('countProduct', $countProduct);
        return $next($request);
    }
}
