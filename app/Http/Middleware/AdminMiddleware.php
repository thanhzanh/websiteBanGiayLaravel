<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->is('admin/*') && !Session::has('infoAdmin')) {
        //     // nếu không có session thì quay về login
        //     toastr()->error('Vui lòng đăng nhập để tiếp tục!');
        //     return redirect()->route('admin'); // Chuyển hướng về trang login
        // }

        return $next($request);
    }
}
