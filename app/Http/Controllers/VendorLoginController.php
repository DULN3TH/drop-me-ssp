<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorLoginController extends Controller
{
    public function showVendorLoginForm()
    {
        return view('auth.vendor_login');
    }

    public function vendor_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed for vendor...
            return view('vendor.dashboard');
        }

        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


}
