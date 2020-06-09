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

Route::get('/', function () {
    return view('welcome');
});
//Route::view('/test','add-edit');
Route::get('product','ProductController@index')->name('product');
Route::post('products','ProductController@add')->name('products');
Route::get('/edit/{product}','ProductController@edit');
Route::post('/update/{product}','ProductController@update');
Route::delete('/delete/{product}','ProductController@destroy');
