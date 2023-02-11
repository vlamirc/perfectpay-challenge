<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function form()
    {
        return view('checkout.form');
    }

    public function congratulation()
    {
        return view('checkout.congratulation');
    }
}
