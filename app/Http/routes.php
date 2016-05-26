<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix'=>'admin', 'middeware'=>'auth'],function(){
    Route::group(['prefix'=>'news'],function(){
        Route::resource('category','NewsCategoryController');
        Route::resource('list','NewsListController');
        Route::get('search','NewsListController@search');
    });
    Route::group(['prefix'=>'product'],function(){
        Route::resource('category','ProductCategoryController');
        Route::resource('list','ProductListController');
        Route::get('search','ProductListController@search');
        Route::get('list/delete/{id}','ProductListController@delete');
        Route::get('list/status/{type}/{id}','ProductListController@status');
    });
    Route::resource('menu','MenuController');
    Route::resource('slider','SliderController');
    Route::resource('support','SupportController');
    Route::resource('contenthtml','ContentHTMLController',['only' => ['index', 'edit', 'update']]);
    Route::resource('gallery','GalleryController');
    Route::resource('pageinfo','PageInfoController',['only' => ['index', 'edit', 'update']]);
});

Route::get('/', 'FrontendController@index');
Route::get('news/{alias}','FrontendController@news');
Route::get('category-news/{alias?}','FrontendController@categorynews');
Route::get('product/{alias?}','FrontendController@product');
Route::get('category-product/{alias?}','FrontendController@categoryproduct');
