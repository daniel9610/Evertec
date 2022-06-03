<?php

namespace App\Services;
use GuzzleHttp\Client;

class PlaceToPayService
{
    // protected $url;
    // protected $http;
    // protected $headers;

    // public function __construct(Client $client)
    // {
    //     $this->url = env('PLACETOPAY_BASE_URL');
    //     $this->http = $client;
    //     $this->headers = [
    //         'cache-control' => 'no-cache',
    //         'content-type' => 'application/x-www-form-urlencoded',
    //     ];
    // }

    public static function createSession($data)
    {
        $seed = date('c');
        $tranKey = '024h1IlD';
        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }
        
        $nonceBase64 = base64_encode($nonce);
        $test = $nonce . $seed . $tranKey;

        $tranKey = base64_encode(sha1($test));
        return response()->json(['tran' => $tranKey, 'nonce' => $nonceBase64] );

        $client = new Client();
        $results = $client->request('POST',  env('PLACETOPAY_BASE_URL').'/api/session', [
             'verify' => false,
             'headers' => [
                 'Content-Type' => 'application/xml'
             ],
             'form_params' => [
                'locale' => 'es_CO',
                'auth' => [
                    'login' => '6dd490faf9cb87a9862245da41170ff2',
                    'tranKey' => $tranKey,
                    'nonce' => $nonce,
                    'seed' => date("Y-m-d H:i:s"),
                ],
                "payment"=> [
                    "reference"=> $data->order_id,
                    "description"=> $data->description,
                    "amount"=> [
                      "currency"=> "COP",
                      "total"=> $data->price
                    ],
                    "allowPartial"=> false
                ],
                // "expiration": "2021-12-30T00:00:00-05:00",
                // "returnUrl": "https://dnetix.co/p2p/client",
                // "ipAddress": "127.0.0.1",
                // "userAgent": "PlacetoPay Sandbox"
             ],
         ]);
         $results = $results->getBody();
         return $results;
    }
}
