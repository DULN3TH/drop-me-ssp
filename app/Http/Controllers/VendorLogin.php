<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorLogin extends Controller
{
    public function showVendorLoginForm()
    {
        return view('auth.vendor_login');
    }
}
