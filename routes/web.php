<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

// Route::prefix('_manage')->middleware('role:superadministrator|administrator|supporter')->group(function(){
//     Route::get('/', 'ManageController@index')->name('manage.index');
//     Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
//     Route::resource('/users', 'UserController');
//     Route::resource('/providers', 'ProviderController');
//     Route::resource('/categories', 'CategoryController');
//     Route::resource('/meals', 'MealController');
//     Route::resource('/promotions', 'PromotionController');
//     Route::resource('/orders', 'OrderController');
//     Route::resource('/order-items', 'OrderController');
// });

Route::prefix('_manage')->group(function(){
    Route::get('/', 'ManageController@index')->name('manage.index');
    Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
    Route::resource('/users', 'UserController');
    Route::resource('/providers', 'ProviderController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/meals', 'MealController');
    Route::resource('/promotions', 'PromotionController');
    Route::resource('/orders', 'OrderController');
    Route::resource('/order-items', 'OrderController');
});



Route::get('/home', 'HomeController@index')->name('home');
