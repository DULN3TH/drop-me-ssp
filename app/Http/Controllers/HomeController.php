<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        return view("home");
    }

//    public function vendor_login(Request $request)
//    {
//        return view("vendor.dashboard");
//    }
}
