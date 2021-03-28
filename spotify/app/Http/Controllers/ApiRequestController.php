<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AccessTokenService;
use App\Services\RequestApiResponseService;
use Exception;

class ApiRequestController extends Controller
{

    private $token;
    private $spotify;

    public function __construct( AccessTokenService $accessTokenService, RequestApiResponseService $requestApiResponseService)
    {

        $this->token = $accessTokenService;
        $this->spotify = $requestApiResponseService;

    }

    public function getBandDiscography(Request $request)
    {
        try {

            if (!($request->q))
                throw new Exception( 'ERROR: HTTP ERROR STATUS 400 (BAD REQUEST)- Artist Parameter Required');

            $band_name = $request->q;

            $final_token = $this->token->getAuthToken();

            $band_discography = $this->spotify->formatRequest($band_name, $final_token);

            var_dump($band_discography);

        }catch (Exception $e){

            throw $e;
        }
    }
}
