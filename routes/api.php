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

Route::middleware('throttle:4,1')
    ->post('store-device', 'Api\DeviceController@store');

Route::post('me', 'Api\DeviceController@getMe');
Route::post('store-firebase-token', 'Api\DeviceController@storeFirebaseToken');
Route::post('device-history', 'Api\DeviceController@getNearby');
Route::middleware('throttle:4,1')
    ->post('set-health', 'Api\DeviceController@setHealth');

Route::get('/', function () {
    return response()->json([
        'message' => 'Hello Developer'
    ]);
});

Route::get('/member-interaction', 'Api\MappingController@associatedInteraction');
Route::get('/device-interaction', 'Api\MappingController@recordedInteraction');

