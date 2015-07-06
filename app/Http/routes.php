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
Route::pattern('id','[0-9]+');

Route::get('user/{id?}', function($id = null) {
    if( $id)
        return "Olá $id";

    return "Não possui ID";

});

Route::match(['get','post'],'/exemplo2',function(){
    return "OI";
});

Route::group(['prefix'=>'admin'], function () {
    Route::get('categories',['as'=>'categories','uses'=>'AdminCategoriesController@index']);
    Route::get('product',['as'=>'products','uses'=>'AdminProductsController@index']);
    Route::get('product/create',['as'=>'products.create','uses'=>'AdminProductsController@create']);
    Route::get('categories/create',['as'=>'categories.create','uses'=>'AdminCategoriesController@create']);


});
Route::get('categories',['as'=>'categories','uses'=>'CategoriesController@index']);
Route::get('categories/create',['as'=>'categories.create','uses'=>'CategoriesController@create']);
Route::post('categories',['as'=>'categories.store','uses'=>'CategoriesController@store']);
Route::get('categories/{id}/destroy',['as'=>'categories.destroy','uses'=>'CategoriesController@destroy']);
Route::get('categories/{id}/edit',['as'=>'categories.edit','uses'=>'CategoriesController@edit']);
Route::put('categories/{id}/update',['as'=>'categories.update','uses'=>'CategoriesController@update']);

Route::get('/', 'WelcomeController@index');
Route::get('/exemplo', 'WelcomeController@exemplo');
