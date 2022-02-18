<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//登入
Route::group(['middleware' => ['auth.user']], function () {

    //首頁(交易大廳)
    Route::get('/', 'TradeController@index')->name('trade');
    Route::group(['prefix' => 'trade'], function () {
        Route::get('/create', 'TradeController@create')->name('trade.create');
        Route::get('/edit/{trade_id}', 'TradeController@edit')->name('trade.edit');
        Route::post('/editform', 'TradeController@editform')->name('trade.editform')->middleware('form');
    });

    Route::get('/login', 'LoginController@login')->name('login');//登入
    Route::post('/loginform', 'LoginController@loginform')->name('loginform')->middleware('form');//登入表單
    Route::get('/logout', 'LoginController@logout')->name('logout');//登出
    Route::get('/register', 'LoginController@register')->name('register');//註冊
    Route::post('/registerform', 'LoginController@registerform')->name('registerform')->middleware('form');//註冊表單

    //會員
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('user.index');//會員中心首頁
        Route::post('/editform', 'UserController@editform')->name('user.edit')->middleware('form');//修改資料表單
        Route::get('/notify', 'UserController@notify')->name('user.notify');
        Route::get('/paylist', 'UserController@paylist')->name('user.paylist');
    });

    //聊天室
    Route::group(['prefix' => 'chat'], function () {
        Route::get('/', 'ChatController@chatBox')->name('chat.chatBox');//聊天室測試頁
    });

    Route::get('/userbad/{id}', 'UserController@userbad')->name('user.userbad');
});

