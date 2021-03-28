<?php


namespace App\Services\Adapters;

use Illuminate\Support\Facades\Http;
use Exception;

class RequestApiResponseAdapter
{

    //Get band discography by token auth, use headers as spotify api points out
    public function getBandFullDiscographyByBandName($band_name, $type = 'album', $token)
    {

        $albums = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$token])
            ->get(env('URL_BANDS_SPOTIFY_API').'?query=' .$band_name . '&type=' . $type );

        if ($albums->failed())
            throw new Exception('HTTP ERROR STATUS 400 - BAD REQUEST');

        elseif ($albums->serverError())
            throw new Exception('HTTP ERROR STATUS 500 - SERVER ERROR');

        return json_decode($albums)->albums->items;
    }

}
