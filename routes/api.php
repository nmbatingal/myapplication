<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ADDRESS
Route::get('address/regions', 'OpenApiController@regions');
Route::get('address/provinces', 'OpenApiController@provinces');
Route::get('address/municipalities', 'OpenApiController@municipalities');
Route::get('address/barangays', 'OpenApiController@barangays');

// ACADEMIC DATA
Route::get('academic/degrees', 'OpenApiController@academicDegrees');