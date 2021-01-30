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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('country','Country\CountryController@country');
// Route::get('country/{id}','Country\CountryController@countryById');
// Route::post('country','Country\CountryController@countrySave');
// Route::put('country/{id}','Country\CountryController@countryUpdate');
// Route::delete('country/{id}','Country\CountryController@countryDelete');

Route::apiResource('country','Country\Country');
Route::get('file/country_list','FileController@countryList');
Route::post('file/country_list','FileController@countrySave');

Route::post('register','FirstCreation\RegisterController@registerSave');
Route::post('registerWithoutPicture','FirstCreation\RegisterController@registerSaveWithoutPicture');
Route::get('register','FirstCreation\RegisterController@register');
Route::get('showOtherProfiles/{id}','FirstCreation\RegisterController@showOtherProfiles');
Route::get('registerFilter','FirstCreation\RegisterController@registerFilter');
Route::get('register/{id}','FirstCreation\RegisterController@registerById');
Route::put('register/{id}','FirstCreation\RegisterController@registerUpdate');
Route::put('registerUpdateWithoutPicture/{id}','FirstCreation\RegisterController@registerUpdateWithoutPicture');
Route::post('registerUpdate/','FirstCreation\RegisterController@registerUpdate');
Route::post('registerSavePicture/','FirstCreation\RegisterController@registerUpdatePicture');
Route::delete('register/{id}','FirstCreation\RegisterController@registerDelete');

Route::get('accountMemory','FirstCreation\AccountMemoryController@accountMemory');
Route::post('accountMemory','FirstCreation\AccountMemoryController@accountMemorySave');

Route::post('selectFavourites','FirstCreation\SelectFavouritesController@selectFavouritesSave');
Route::get('selectFavourites','FirstCreation\SelectFavouritesController@selectFavourites');
Route::get('selectFavourites/{id}','FirstCreation\SelectFavouritesController@selectFavouritesById');
Route::put('selectFavourites/{id}','FirstCreation\SelectFavouritesController@selectFavouritesUpdate');
Route::delete('selectFavourites/{id}','FirstCreation\SelectFavouritesController@selectFavouritesDelete');

Route::post('writedownFavourites','FirstCreation\WriteDownFavouritesController@writedownFavouritesSave');
Route::get('writedownFavourites','FirstCreation\WriteDownFavouritesController@writedownFavourites');
Route::get('writedownFavourites/{id}','FirstCreation\WriteDownFavouritesController@writedownFavouritesById');
Route::put('writedownFavourites/{id}','FirstCreation\WriteDownFavouritesController@writedownFavouritesUpdate');
Route::delete('writedownFavourites/{id}','FirstCreation\WriteDownFavouritesController@writedownFavouritesDelete');

Route::post('yesnoFavourites/','FirstCreation\YesNoFavouritesController@yesNoFavouritesSave');
Route::get('yesnoFavourites','FirstCreation\YesNoFavouritesController@yesNoFavourites');
Route::get('yesnoFavourites/{id}','FirstCreation\YesNoFavouritesController@yesNoFavouritesById');
Route::put('yesnoFavourites/{id}','FirstCreation\YesNoFavouritesController@yesNoFavouritesUpdate');
// Route::post('yesnoFavouritesUpdate/','FirstCreation\YesNoFavouritesController@yesNoFavouritesUpdate');
Route::delete('yesnoFavourites/{id}','FirstCreation\YesNoFavouritesController@yesNoFavouritesDelete');

Route::post('file-upload', 'FirstCreation\ImageTestController@store');