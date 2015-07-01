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
    Route::get('product/edit/{id}',['as'=>'products.edit','uses'=>'AdminProductsController@edit']);
    Route::get('categories/edit/{id}',['as'=>'categories.edit','uses'=>'AdminCategoriesController@edit']);

    /* Testing to pass Model in the route and router grouping */
    Route::get('category_/{category}',['as'=>'category_',function(\CodeCommerce\Category $category){
        echo $category->name;
    }]);
    Route::get('product_/{product}',['as'=>'product_', function(\CodeCommerce\Product $product){
        echo $product->description;
    }]);
});

Route::get('/', 'WelcomeController@index');
Route::get('/exemplo', 'WelcomeController@exemplo');
