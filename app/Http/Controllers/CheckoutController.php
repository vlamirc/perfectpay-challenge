<?php

namespace App\Http\Controllers;

use MercadoPago\Payment;
use MercadoPago\SDK;

class CheckoutController extends Controller
{
    public function form()
    {
        return view('checkout.form');
    }

    public function send()
    {
        dump(request()->all());

        SDK::setAccessToken(config('app.mp_access_token'));

        $payment = new Payment();

        $payment->description = request('productDescription');
        $payment->transaction_amount = request('productValue');
        $payment->installments = 1;
        // $payment->token = "YOUR_CARD_TOKEN";
        $payment->payment_method_id = "visa";
        $payment->payer = array(
          "email" => request('email')
        );

        $payment->save();

        dd(config('app.mp_public_key'), config('app.mp_access_token'), $payment, $payment->status);

        return redirect()->route('checkout.thanks');
    }

    public function thanks()
    {
        return view('checkout.thanks');
    }
}
