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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'category','as'=>'category.', 'middleware' => 'auth'], function(){

    Route::get('/', [
    'as' => 'index', 'uses' => 'Category\CategoryController@index'
    ]);
    Route::get('search', [
    'as' => 'search', 'uses' => 'Category\CategoryController@search'
    ]);

    Route::get('create', [
    'as' => 'create', 'uses' => function(){
            return view('category/create');
        }
    ]);
    Route::post('store', [
    'as' => 'store', 'uses' => 'Category\CategoryController@store'
    ]);

    Route::get('edit/{id}', [
        'as' => 'edit/{id}', 'uses' => 'Category\CategoryController@find'
    ]);
    
    Route::post('update', ['as' => 'update', 'uses' => 'Category\CategoryController@storeupdate']);

    Route::get('hapus/{id}', [
        'as' => 'hapus/{id}', 'uses' => 'Category\CategoryController@delete'
    ]);

    

});
