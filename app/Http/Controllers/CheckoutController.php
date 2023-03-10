<?php

namespace App\Http\Controllers;

use App\Lib\MercadoPago;
use App\Models\Item;

class CheckoutController extends Controller
{
    public function cart()
    {
        $items = Item::all();

        return view('checkout.cart', compact('items'));
    }

    public function payment()
    {
        $item = Item::find(request('item'));
        $email = request('email');

        return view('checkout.payment', compact('item', 'email'));
    }

    public function proccess()
    {
        $item = Item::find(request('item'));
        $json = (new MercadoPago)->proccess(request()->collect()->put('description', $item['description']));

        return response()->json($json);
    }

    public function status()
    {
        $id = request('id');

        return view('checkout.status', compact('id'));
    }
}
