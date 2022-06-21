<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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




//////////////////////////////////////////////////////////////////////////
//UserController API
Route:: get('/users/index', 'UserController@index');

Route:: post('/users/user_register', 'UserController@user_register');

Route::post('/products/all_product', 'UserController@all_product');

Route::group(['prefix' => 'user'],function (){
        Route::post('login', 'UserController@login');

        Route::post('logout','UserController@logout') -> middleware(['auth.guard:user-api']);

 });

////////////////////////////////////////////////////////////////
//AdminController API
Route:: get('/products/add_or_sub_price/{status}', 'AdminupdateController@add_or_sub_price');







