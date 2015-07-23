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
    Route::get('product',['as'=>'product','uses'=>'AdminProductController@index']);
    Route::get('product/create',['as'=>'product.create','uses'=>'AdminProductController@create']);
    Route::get('categories/create',['as'=>'categories.create','uses'=>'AdminCategoriesController@create']);
});

Route::group(['prefix'=>'admin','where'=>['id'=> '[0-9]+']],function(){
    Route::group(['prefix'=>'categories'],function(){
        Route::get('/',['as'=>'categories.index','uses'=>'AdminCategoriesController@index']);
        Route::get('/create',['as'=>'categories.create','uses'=>'AdminCategoriesController@create']);
        Route::post('/',['as'=>'categories.store','uses'=>'AdminCategoriesController@store']);
        Route::get('/{id}/destroy',['as'=>'categories.destroy','uses'=>'AdminCategoriesController@destroy']);
        Route::get('/{id}/edit',['as'=>'categories.edit','uses'=>'AdminCategoriesController@edit']);
        Route::put('/{id}/update',['as'=>'categories.update','uses'=>'AdminCategoriesController@update']);

    });

    Route::group(['prefix'=>'product'],function(){
        Route::get('/',['as'=>'product.index','uses'=>'AdminProductController@index']);
        Route::get('/create',['as'=>'product.create','uses'=>'AdminProductController@create']);
        Route::post('/',['as'=>'product.store','uses'=>'AdminProductController@store']);
        Route::get('/{id}/destroy',['as'=>'product.destroy','uses'=>'AdminProductController@destroy']);
        Route::get('/{id}/edit',['as'=>'product.edit','uses'=>'AdminProductController@edit']);
        Route::put('/{id}/update',['as'=>'product.update','uses'=>'AdminProductController@update']);


        Route::group(['prefix'=>'images'],function(){
            Route::get('{id}/product',['as'=>'product.images','uses'=>'AdminProductController@images']);
            Route::get('create/{id}/product',['as'=>'product.images.create','uses'=>'AdminProductController@createImage']);
            Route::post('store/{id}/product',['as'=>'product.images.store','uses'=>'AdminProductController@storeImage']);
            Route::get('destroy/{id}/product',['as'=>'product.images.destroy','uses'=>'AdminProductController@destroyImage']);
        });

    });



});

Route::get('/', 'WelcomeController@index');
Route::get('/exemplo', 'WelcomeController@exemplo');
