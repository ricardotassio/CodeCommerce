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

Route::group(['prefix'=>'admin'],function(){
    Route::get('/categories',['as'=>'categories.index','uses'=>'AdminCategoriesController@index']);
    Route::get('/categories/create',['as'=>'categories.create','uses'=>'AdminCategoriesController@create']);
    Route::post('/categories',['as'=>'categories.store','uses'=>'AdminCategoriesController@store']);
    Route::get('/categories/{id}/destroy',['as'=>'categories.destroy','uses'=>'AdminCategoriesController@destroy']);
    Route::get('/categories/{id}/edit',['as'=>'categories.edit','uses'=>'AdminCategoriesController@edit']);
    Route::put('/categories/{id}/update',['as'=>'categories.update','uses'=>'AdminCategoriesController@update']);

    Route::get('/products',['as'=>'products.index','uses'=>'AdminProductsController@index']);
    Route::get('/products/create',['as'=>'products.create','uses'=>'AdminProductsController@create']);
    Route::post('/products',['as'=>'products.index','uses'=>'AdminProductsController@store']);
    Route::get('/products/{id}/destroy',['as'=>'products.destroy','uses'=>'AdminProductsController@destroy']);
    Route::get('/products/{id}/edit',['as'=>'products.edit','uses'=>'AdminProductsController@edit']);
    Route::put('/products/{id}/update',['as'=>'products.update','uses'=>'AdminProductsController@update']);
});

Route::get('/', 'WelcomeController@index');
Route::get('/exemplo', 'WelcomeController@exemplo');
