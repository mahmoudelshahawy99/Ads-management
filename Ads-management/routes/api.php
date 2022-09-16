<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('tags', 'API\TagController');
Route::resource('categories', 'API\CategoryController');

Route::get('Ad/showAdvertiser/{id}', 'API\AdController@showAds');
Route::get('Ad/filterCat/{category}', 'API\AdController@filterCat');
Route::get('Ad/filterTag/{tag}', 'API\AdController@filterTag');

Route::get('Homos', 'API\AdvertiserController@getHomos');
