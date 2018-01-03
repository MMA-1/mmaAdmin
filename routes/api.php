<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/master/category','MasterController@category');
Route::get('/master/subcategory','MasterController@subcategory');
Route::get('/master/mediatypes','MasterController@mediatypes');
Route::get('/master/albums','MasterController@albums');
Route::get('/master/artists','MasterController@artists');