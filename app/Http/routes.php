<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::match(['get','post'],'/exemplo2',function(){
    return "OI";
});
Route::get('admin/categories','AdminCategoriesController@index');
Route::get('admin/product','AdminProductsController@index');
Route::get('/', 'WelcomeController@index');
Route::get('/exemplo', 'WelcomeController@exemplo');
