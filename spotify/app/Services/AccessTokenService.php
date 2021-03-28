<?php


namespace App\Services;

use App\Services\Adapters\AccessTokenAdapter;


class AccessTokenService
{

    private $token;

    public function __construct(AccessTokenAdapter $accessTokenAdapter)
    {

        $this->token = $accessTokenAdapter;
    }

    public function getAuthToken()
    {

        $auth_token = $this->token->getAccessToken();

        return $auth_token;
    }
}
