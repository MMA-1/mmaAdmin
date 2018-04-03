<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/master/category','MasterController@category');
Route::get('/master/subcategory','MasterController@subcategory');
Route::get('/master/mediatypes','MasterController@mediatypes');
Route::post('/master/albums','MasterController@albums');
Route::post('/master/artists','MasterController@artists');