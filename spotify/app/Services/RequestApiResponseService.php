<?php


namespace App\Services;

use App\Services\Adapters\RequestApiResponseAdapter;
use Exception;
use stdClass;

class RequestApiResponseService
{

    private $bandDiscography;

    public function __construct(RequestApiResponseAdapter $requestApiResponseAdapter)
    {

        $this->bandDiscography = $requestApiResponseAdapter;

    }

    public function formatRequest($band_name, $token){

        $band_discography = array();

        $response = $this->bandDiscography->getBandFullDiscographyByBandName($band_name, $token);

        if ($response->failed())
            throw new Exception('HTTP ERROR STATUS 400 - BAD REQUEST');

        elseif ($response->serverError())
            throw new Exception('HTTP ERROR STATUS 500 - SERVER ERROR');

        $albums = json_decode($response)->albums->items;

        //check if response returns empty
        if (empty($albums))
            throw new Exception('ERROR: HTTP ERROR STATUS 400 (BAD REQUEST) - Data not available or non existent artist');

        foreach ($albums as $album){

            //create both objects for response
            $album_obj = new stdClass();
            $cover = new stdClass();

            $album_obj->name = $album->name;
            $album_obj->released = date("d/m/Y", strtotime($album->release_date));
            $album_obj->tracks = $album->total_tracks;

            $cover->height = $album->images[0]->height;
            $cover->width = $album->images[0]->width;
            $cover->url = $album->images[0]->url;

            $album_obj->cover = $cover;

            //push to response array
            $band_discography[] = $album_obj;
        }

        return $band_discography;

    }
}
