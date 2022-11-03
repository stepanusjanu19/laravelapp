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


Route::group(['prefix'=>'category','as'=>'category.'], function() {
    Route::get('/',[
        'as' => 'index', 'uses' => 'Api\Category\CategoryController@index'
        ]);
    Route::get('show/{id}', [
        'as' => 'show/{id}', 'uses' => 'Api\Category\CategoryController@show'
        ]);
    Route::post('store',[
        'as' => 'store', 'uses' => 'Api\Category\CategoryController@store'
        ]);
    Route::put('update/{id}',[
        'as' => 'update/{id}', 'uses' => 'Api\Category\CategoryController@update'
        ]);
    Route::delete('delete/{id}',[
        'as' => 'delete', 'uses' => 'Api\Category\CategoryController@delete'
        ]);
});