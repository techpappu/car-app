<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()    {
        
        
    }

    public function index(){
        return view('admin.dashboard');
    }
    public function seller(){
        return view('admin.seller_dashboard');
    }
}
