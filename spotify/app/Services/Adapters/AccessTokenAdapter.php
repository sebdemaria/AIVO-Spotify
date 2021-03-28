<?php


namespace App\Services\Adapters;

use Illuminate\Support\Facades\Http;


class AccessTokenAdapter
{

    //Get access token for request permission
    //Body encoded with application/x-www-form-urlencoded
    public function getAccessToken()
    {

        $token = Http::withBasicAuth(env('CLIENT_ID'), env('CLIENT_SECRET'))
            ->asForm()->post(env('URL_TOKEN_SPOTIFY'),
                [
                    'grant_type' => 'client_credentials'
                ]);

        if ($token->serverError())
            throw new Exception('HTTP ERROR STATUS 500 - SERVICE UNAVAILABLE');

        return json_decode($token)->access_token;
    }

}
