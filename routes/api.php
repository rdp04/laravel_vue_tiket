<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/categori','Categori\CategoriController');
Route::resource('/tiket','Tiket\TiketController');

Route::get('/transaksi','Transaksi\TransaksiController@index');
Route::delete('/transaksi/{transaksi}','Transaksi\TransaksiController@destroy');
Route::get('/transaksi/update/','Transaksi\TransaksiController@update');
Route::get('/transaksi/{transaksi}','Transaksi\TransaksiController@show');
Route::post('/transaksi/store','Transaksi\TransaksiController@store');