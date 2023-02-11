<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function form()
    {
        return view('checkout.form');
    }

    public function send()
    {
        dump(request()->all());

        return redirect()->route('checkout.thanks');
    }

    public function thanks()
    {
        return view('checkout.thanks');
    }
}
