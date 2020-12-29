<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'FrontEndController@index');
Route::post('get-districts-by-provinces/{id}', 'FrontEndController@getDistrict');
Route::get('/phongtro/{slug}', 'FrontEndController@phongtro')->name('phongtro.view');
Route::get('/report/{id}','FrontEndController@userReport')->name('user.report');
Route::get('category/{slug}','FrontEndController@getMotelByCategoryId')->name('category.search');
Route::post('search','FrontEndController@searchList')->name('search.list');
/* Admin */

Route::group(['prefix'=>'admin','middleware'=>'admin'], function () {
    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'AdminController@getIndex',
//        'middleware' => 'can:product-list'
    ]);
    Route::get('/thongke', [
        'as' => 'admin.thongke',
        'uses' => 'AdminController@getThongke',
//        'middleware' => 'can:product-list'
    ]);
    Route::get('/report', [
        'as' => 'admin.report',
        'uses' => 'AdminController@getReport',
//        'middleware' => 'can:product-list'
    ]);
    Route::group(['prefix'=>'users'],function(){
        Route::get('list','AdminController@getListUser')->name('admin.users.list');
        Route::get('edit/{id}','AdminController@getUpdateUser');
        Route::post('edit/{id}','AdminController@postUpdateUser')->name('admin.user.edit');
        Route::get('del/{id}','AdminController@DeleteUser');
    });
    Route::group(['prefix'=>'motelrooms'],function(){
        Route::get('list','AdminController@getListMotel');
        Route::get('approve/{id}','AdminController@ApproveMotelroom');
        Route::get('unapprove/{id}','AdminController@UnApproveMotelroom');
        Route::get('del/{id}','AdminController@DelMotelroom');
        // Route::get('edit/{id}','AdminController@getUpdateUser');
        // Route::post('edit/{id}','AdminController@postUpdateUser')->name('admin.user.edit');
        // Route::get('del/{id}','AdminController@DeleteUser');
    });
});
/*End Admin */
Route::prefix('dangtin')->group(function () {
    Route::get('/post', [
        'as' => 'post.index',
        'uses' => 'MotelRoomController@index',
        'middleware' => 'post'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'post.edit',
        'uses' => 'MotelRoomController@edit',
        'middleware' => 'post'
    ]);
    Route::post('/update/{id}', [
        'as' => 'post.update',
        'uses' => 'MotelRoomController@update',
        'middleware' => 'post'
    ]);
    Route::post('/post/create', [
        'as' => 'post.create',
        'uses' => 'MotelRoomController@create',
        'middleware' => 'post'
    ]);

    Route::get('/post/delete/{id}', [
        'as' => 'post.delete',
        'uses' => 'MotelRoomController@delete',
        'middleware' => 'post'
    ]);
    Route::get('/profile/', [
        'as' => 'profile.index',
        'uses' => 'UserController@getprofile',
        'middleware' => 'post'
    ]);
});
Route::prefix('user')->group(function () {
    Route::get('/profile/', [
        'as' => 'profile.index',
        'uses' => 'UserController@getprofile',
        'middleware' => 'post'
    ]);
    Route::get('/profile/edit', [
        'as' => 'profile.edit',
        'uses' => 'UserController@getEditprofile',
        'middleware' => 'post'
    ]);
    Route::post('/profile/update', [
        'as' => 'profile.update',
        'uses' => 'UserController@postEditprofile',
        'middleware' => 'post'
    ]);
});
Auth::routes();

