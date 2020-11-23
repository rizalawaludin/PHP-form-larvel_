<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FormController@index');
Route::get('/fresh','FormController@fresh');
Route::post('/fresh/pesanan','FormController@add_fresh')->name('add_fresh');
Route::get('/retur','FormController@retur');
Route::post('/retur/pesanan','FormController@add_retur')->name('add_retur');

Route::get('/alert','FormController@alert');
Route::get('/pesanan/tersedia','FormController@ptersedia');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Auth::Routes();

	Route::get('/home', 'HomeController@index')->name('home');

//------------------------------Fresh---------------------------------
	Route::get('/produk/fresh','ProductController@index');
	Route::post('/produk/fresh/add','ProductController@store');
	Route::get('/produk/fresh/{id}/edit','ProductController@edit');
	Route::post('/produk/{id}/fresh','ProductController@update');
	Route::delete('produk_fresh', 'ProductController@destroy');
	Route::post('/produk/fresh/excel','ImportController@fresh');
	Route::get('/produk/fresh/export','ImportController@ifresh');
//------------------------------Fresh---------------------------------
	Route::get('/produk/retur','Product2Controller@index');
	Route::post('/produk/retur/add','Product2Controller@store');
	Route::get('/produk/retur/{id}/edit','Product2Controller@edit');
	Route::post('/produk/{id}/retur','Product2Controller@update');
	Route::delete('produk_retur', 'Product2Controller@deleteAll');
	Route::post('/produk/retur/excel','ImportController@retur');
	Route::get('/produk/retur/export','ImportController@iretur');

Route::group(['middleware' => ['auth','checkRole:pegawai']],function() {
//------------------------------pesanan---------------------------------
	Route::get('/pesanan/fresh','PesananController@fresh');
	Route::get('/pesanan/retur','PesananController@retur');
	Route::delete('order_product', 'PesananController@deleteAll');
	Route::delete('order_product2', 'PesananController@deleteAll2');
	Route::get('/pesanan/fresh/{fod_no}','PesananController@detail_fresh');
	Route::get('/pesanan/retur/{fod_no}','PesananController@detail_retur');
	Route::get('/pesanan/fresh/{fod_no}/export','PesananController@fresh_order');
	Route::get('/pesanan/retur/{fod_no}/export','PesananController@retur_order');
	//------------------------------Pengembalian Produk------------------
	Route::get('/return_retur','ReturnController@index');
	Route::delete('return_delete','ReturnController@deleteAll');
});
Route::group(['middleware' => ['auth','checkRole:jakarta,ciawi,cibitung,sentul']],function() {
	//------------------------------pesanan---------------------------------
	Route::get('/order/fresh','OrderController@fresh');
	Route::get('/order/fresh/export','OrderController@ifresh');
	Route::get('/order/retur','OrderController@retur');
	Route::get('/order/retur/export','OrderController@iretur');
	Route::get('/fresh/{id}/edit','OrderController@edit_fresh');
	Route::get('/retur/{id}/edit','OrderController@edit_retur');
	Route::post('/fresh/{id}','OrderController@update_fresh');
	Route::post('/retur/{id}','OrderController@update_retur');
	Route::delete('order_delete','OrderController@deleteAll');
	Route::delete('order_delete2','OrderController@deleteAll2');
	Route::post('/ksjalan/fresh','OrderController@sendorder_fresh');
	Route::post('/ksjalan/retur','OrderController@sendorder_retur');
	//------------------------Pesanan Tersedia------------------------------
	Route::get('/order/fresh/tersedia','PesananController@pesanan_fresh');
	Route::get('/order/fresh/{id}/edit','PesananController@edit_fresh');
	Route::post('/fresh/order/{id}','PesananController@update_fresh');
	Route::get('/order/retur/tersedia','PesananController@pesanan_retur');
	Route::get('/order/retur/{id}/edit','PesananController@edit_retur');
	Route::post('/retur/order/{id}','PesananController@update_retur');
	Route::delete('order_delete3', 'PesananController@deleteAll3');
	Route::delete('order_delete4', 'PesananController@deleteAll4');
	Route::delete('order_delete5', 'PesananController@deleteAll5');
	Route::delete('order_delete6', 'PesananController@deleteAll6');
	//------------------------Gudang Koperasi-------------------------------
	Route::get('/gfresh','GudangController@fresh');
	Route::get('/gretur','GudangController@retur');
	//------------------------------Pengembalian Produk---------------------------------
	Route::get('/gudang/retur/export','ReturnController@iretur');
	Route::post('/gudang/retur','ReturnController@send_retur');
	//------------------------------History---------------------------------
	Route::get('/history/fresh','HistoryController@fresh');
	Route::get('/history/retur','HistoryController@retur');
});


