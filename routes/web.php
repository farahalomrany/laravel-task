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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ProductController
Route::get('/Products/add', 'ProductController@add')->name('add-Product');

Route::post('/Products/store', 'ProductController@store')->name('store-Product');

Route::get('/Products/all', 'ProductController@all')->name('all-Products');

Route::get('/Products/edit/{id}', 'ProductController@edit')->name('edit-Products');

Route::post('/Products/edit/{id}', 'ProductController@update')->name('edit-Products');

Route::get('/Products/delete/{id}', 'ProductController@delete')->name('delete-Products');



