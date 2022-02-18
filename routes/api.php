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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//聊天室收訊息 - todo 測試先設成 Any
Route::any('chat/sendMessage', 'ChatApiController@sendMessage')->name('api.chat.sendMessage');
//聊天室接收訊息 show  - todo 測試先設成 Any
Route::post('chat/showMessageAuth', 'ChatApiController@showMessageAuth')->name('api.chat.showMessage');

Route::post('chat/auth', 'ChatApiController@privateAuth')->name('api.chat.auth');

//發送簡訊api
// Route::group(['prefix' => 'phone'], function () {
//     Route::post('/send', 'PhoneController@send')->name('api.phone.send');
// });
