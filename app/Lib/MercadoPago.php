<?php

namespace App\Lib;

use Illuminate\Support\Collection;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\SDK;

class MercadoPago
{
    public function proccess(Collection $payload)
    {
        if ($payload['payment_method_id'] == 'bolbradesco') {
            $json = $this->boleto($payload);
        } else {
            $json = $this->creditCard($payload);
        }

        return $json;
    }

    private function creditCard(Collection $payload)
    {
        SDK::setAccessToken(config('app.mp_access_token'));

        $payment = new Payment();

        $payment->transaction_amount = $payload['transaction_amount'];
        $payment->token = $payload['token'];
        $payment->installments = $payload['installments'];
        $payment->payment_method_id = $payload['payment_method_id'];
        $payment->issuer_id = $payload['issuer_id'];
        $payer = new Payer();
        $payer->email = $payload['payer']['email'];
        $payer->identification = [
           'type' => $payload['payer']['identification']['type'],
           'number' => $payload['payer']['identification']['number'],
        ];
        $payment->payer = $payer;

        $payment->save();

        return [
           'status' => $payment->status,
           'status_detail' => $payment->status_detail,
           'id' => $payment->id
        ];
    }

    private function boleto(Collection $payload)
    {
        SDK::setAccessToken(config('app.mp_access_token'));

        $payment = new Payment();

        $payment->transaction_amount = $payload['transaction_amount'];
        $payment->payment_method_id = $payload['payment_method_id'];
        $payment->description = $payload['description'];
        $payment->payer = $payload['payer'];

        $payment->save();

        return [
           'status' => $payment->status,
           'status_detail' => $payment->status_detail,
           'id' => $payment->id
        ];
    }
}
