<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('detail/{id}/{slug}.html','HomeController@detail')->name('get.detail.product');
Route::get('category/{id}/{slug}.html','HomeController@getCategory');

Route::get('search','HomeController@getSearch');
Route::get('/product/search','HomeController@getAutoSearch')->name('autosearch');

Route::get('contact','ContactController@index')->name('get.contact');
Route::post('contact','ContactController@store')->name('post.contact');

Route::get('info/{id}','InfoController@index')->name('get.info');
Route::post('info/{id}','InfoController@post');

Route::group(['namespace'=>'Auth'],function(){
    Route::get('dang-ky','RegisterController@getRegister')->name('get.register');
    Route::post('dang-ky','RegisterController@postRegister')->name('post.register');

    Route::get('dang-nhap','LoginController@getLogin')->middleware('CheckLogedIn')->name('get.login');
    Route::post('dang-nhap','LoginController@postLogin')->name('post.login');
    Route::get('dang-xuat','LoginController@getLogout')->name('get.logout.user');

    Route::get('forgot-password','LoginController@getForgotPassword')->name('get.forgot.password');
    Route::post('forgot-password','LoginController@postForgotPassword');

    Route::get('change-password','LoginController@getChangePassword')->name('get.change.password');
    Route::post('change-password','LoginController@postChangePassword');


});


Route::group(['prefix'=>'cart'],function(){
    Route::get('add/{id}','CartController@add');
    Route::get('show','CartController@show');
    Route::get('delete/{id}','CartController@delete');
    Route::get('update','CartController@update');
    Route::post('show','CartController@postComplete');
    Route::get('pay','CartController@getPay')->name('get.pay');
    Route::post('pay','CartController@postPay')->name('post.pay');


});
Route::get('complete','CartController@complete');



