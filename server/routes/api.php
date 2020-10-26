<?php
use App\Http\Controllers\ServiceController;

Route::group(['prefix' => 'services'], function() {
    Route::get('/', 'App\Http\Controllers\ServiceController@index');
});

Route::group(['prefix' => 'carts'], function() {
    Route::post('/', 'App\Http\Controllers\CartController@store');
    Route::get('/', 'App\Http\Controllers\CartController@index');
    Route::get('/{cart}', 'App\Http\Controllers\CartController@show');
    Route::put('/{cart}', 'App\Http\Controllers\CartController@update');
    Route::delete('/{cart}', 'App\Http\Controllers\CartController@destroy');
});