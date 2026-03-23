<?php

namespace App\Lib;

use Illuminate\Support\Collection;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;

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
        MercadoPagoConfig::setAccessToken(config('app.mp_access_token'));

        $client = new PaymentClient();

        $payment = $client->create([
            'transaction_amount' => $payload['transaction_amount'],
            'token'              => $payload['token'],
            'installments'       => $payload['installments'],
            'payment_method_id'  => $payload['payment_method_id'],
            'issuer_id'          => $payload['issuer_id'],
            'payer'              => [
                'email'          => $payload['payer']['email'],
                'identification' => [
                    'type'   => $payload['payer']['identification']['type'],
                    'number' => $payload['payer']['identification']['number'],
                ],
            ],
        ]);

        return [
            'status'        => $payment->status,
            'status_detail' => $payment->status_detail,
            'id'            => $payment->id,
        ];
    }

    private function boleto(Collection $payload)
    {
        MercadoPagoConfig::setAccessToken(config('app.mp_access_token'));

        $client = new PaymentClient();

        $payment = $client->create([
            'transaction_amount' => $payload['transaction_amount'],
            'payment_method_id'  => $payload['payment_method_id'],
            'description'        => $payload['description'],
            'payer'              => $payload['payer'],
        ]);

        return [
            'status'        => $payment->status,
            'status_detail' => $payment->status_detail,
            'id'            => $payment->id,
        ];
    }
}
