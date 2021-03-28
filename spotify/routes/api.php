<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api'], function () {
    Route::get('/v1/albums', 'ApiRequestController@getBandDiscography');
});

