<?php


namespace App\Services\Adapters;

use Illuminate\Support\Facades\Http;
use Exception;

class RequestApiResponseAdapter
{

    //Get band discography by token auth, use headers as spotify api points out
    public function getBandFullDiscographyByBandName($band_name, $token)
    {

        $albums = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$token])
            ->get(env('URL_BANDS_SPOTIFY_API').'?query=' .$band_name . '&type=album');

        return $albums;
    }

}
