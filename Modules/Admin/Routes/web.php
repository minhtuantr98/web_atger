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

//Route::prefix('admin')->group(function() {


Route::group(['prefix'=>'admin'],function(){
//Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOutAdmin'],function(){
    Route::get('/', 'AdminController@index');

    Route::group(['prefix'=>'home'],function(){
        Route::get('/', 'AdminController@index')->name('admin.home');
    });


    Route::group(['prefix'=>'login','middleware'=>'CheckLogedInAdmin'],function(){  
        Route::get('/','LoginController@index')->name('admin.login');
        Route::post('/','LoginController@post');
        
    });

    Route::get('logout','AdminController@logout')->name('admin.logout');

    //category
    Route::group(['prefix'=>'category'],function(){
        Route::get('/','AdminCategoryController@index')->name('admin.get.list.category');
        Route::post('/','AdminCategoryController@store');
        Route::get('update/{id}','AdminCategoryController@edit')->name('admin.get.update.category');
        Route::post('update/{id}','AdminCategoryController@update');
        Route::get('delete/{id}','AdminCategoryController@delete')->name('admin.get.delete.category');
    });
    
    //product
    Route::group(['prefix'=>'product'],function(){
        Route::get('/','AdminProductController@index')->name('admin.get.list.product');
        Route::get('create','AdminProductController@create')->name('admin.get.create.product');
        Route::post('create','AdminProductController@store');
        Route::get('info/{id}','AdminProductController@info')->name('admin.get.info.product');
        Route::get('update/{id}','AdminProductController@edit')->name('admin.get.update.product');
        Route::post('update/{id}','AdminProductController@update');
        Route::get('delete/{id}','AdminProductController@delete')->name('admin.get.delete.product');
    });

    //quản lý liên hệ
    Route::group(['prefix'=>'contact'],function(){
        Route::get('/','AdminContactController@index')->name('admin.get.list.contact');
        Route::get('/active/{id}','AdminContactController@active')->name('admin.get.active.contact');
        Route::get('/delete/{id}','AdminContactController@delete')->name('admin.get.delete.contact');

    });
    //quản lý đơn hàng
    Route::group(['prefix'=>'transaction'],function(){
        Route::get('/','AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/view/{id}','AdminTransactionController@view')->name('admin.get.view.order');
        Route::get('/active/{id}','AdminTransactionController@activeTransaction')->name('admin.get.active.trasaction');
        Route::get('/delete/{id}','AdminTransactionController@delete')->name('admin.get.delete.trasaction');

    });

    Route::group(['prefix'=>'user','middleware'=>'CheckLevel'],function(){
        Route::get('/','AdminUserController@index')->name('admin.get.list.user');

    });

    Route::group(['prefix'=>'manager','middleware'=>'CheckLevel'],function(){
        Route::get('/','AdminManagerController@index')->name('admin.get.list.manager');
        Route::get('create','AdminManagerController@create')->name('admin.get.create.manager');
        Route::post('create','AdminManagerController@store')->name('admin.get.create.manager');
        Route::get('active/{id}','AdminManagerController@active')->name('admin.get.active.manager');
        Route::get('delete/{id}','AdminManagerController@delete')->name('admin.get.delete.manager');
    });
});