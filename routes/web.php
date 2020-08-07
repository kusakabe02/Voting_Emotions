<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
/* 初期値
Route::get('/', function () {
    return view('welcome');
});
*/
/*
//初期ページ変更（ログイン画面に）
Route::get('/', function () {
    return view('index');
});
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


//サインイン後のルーティング、ユーザ認証必須
Route::group(['middleware'=>'auth'],function(){
//投票ページのルーティング
Route::resource('trend', 'TrendController');
Route::put('trend/happy_voting/{id}', 'TrendController@happy_voting');
Route::put('trend/angry_voting/{id}', 'TrendController@angry_voting');
Route::put('trend/blue_voting/{id}', 'TrendController@blue_voting');
Route::put('trend/fun_voting/{id}', 'TrendController@fun_voting');
//投票済みにする
Route::post('user_trend','User_trendController@store')->name('user_trends.user_trend');

//過去の投票一覧画面
Route::resource('oldtrend', 'Old_TrendController');

//ユーザ情報画面
Route::resource('users', 'UserController');

});
//一応作ったが使わない予定
//Route::delete('unuser_trend','User_trendController@destroy')->name('favorites.unfavorite');

/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
