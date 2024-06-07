<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));


        $productname = $request->get('productname');
        $totalprice = session('total');
        $twoO = "00";
        $total = "$totalprice$twoO";

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'LKR',
                        'product_data' => [
                            'name' => $productname,
                        ],
                        'unit_amount' => $total,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);
        return redirect()->away($session->url);
    }

    public function session(Request $request)
    {

    }

    public function success()
    {
        return "Thanks for using DropMe for your purchases. Your order has been placed successfully.";
    }
}
