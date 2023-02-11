<?php

namespace App\Lib;

use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\SDK;

class MercadoPago
{
    public function proccess(array $payload)
    {
        if ($payload['payment_method_id'] == 'bolbradesco') {
            $json = $this->boleto($payload);
        } else {
            $json = $this->creditCard($payload);
        }

        return $json;
    }

    private function creditCard(array $payload)
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
           "type" => $payload['payer']['identification']['type'],
           "number" => $payload['payer']['identification']['number']
        ];
        $payment->payer = $payer;

        $payment->save();

        return [
           'status' => $payment->status,
           'status_detail' => $payment->status_detail,
           'id' => $payment->id
        ];
    }

    private function boleto(array $payload)
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
           "type" => $payload['payer']['identification']['type'],
           "number" => $payload['payer']['identification']['number']
        ];
        $payment->payer = $payer;

        $payment->transaction_amount = $payload['transaction_amount'];
        $payment->description = "Título do produto";
        $payment->payment_method_id = "bolbradesco";
        $payment->payer = array(
            "email" => "test@test.com",
            "first_name" => "Test",
            "last_name" => "User",
            "identification" => array(
                "type" => "CPF",
                "number" => "19119119100"
             ),
            "address"=>  array(
                "zip_code" => "06233200",
                "street_name" => "Av. das Nações Unidas",
                "street_number" => "3003",
                "neighborhood" => "Bonfim",
                "city" => "Osasco",
                "federal_unit" => "SP"
             )
          );

        $payment->save();

        return [
           'status' => $payment->status,
           'status_detail' => $payment->status_detail,
           'id' => $payment->id
        ];
    }
}
