<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function homeDashboard() {
        
        return view('admin.dashboard.index');
    }
}
