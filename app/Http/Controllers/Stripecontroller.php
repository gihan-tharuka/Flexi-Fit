<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Stripecontroller extends Controller
{
    public function checkout(Request $request)
    {

        $total = session('total');
        $name = session('paymenttype');

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([

            'line_items' => [[
                'price_data' => [
                    'currency' => 'lkr',

                    'product_data' => [

                        'name' => $name

                    ],

                    'unit_amount' => $total * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('/order_complete'),
            'cancel_url' => route('/subscription'),
        ]);
        return redirect()->away($session->url);
    }
}
