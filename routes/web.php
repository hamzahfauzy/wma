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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
	Route::prefix('barang')->group(function(){
		Route::get('/','BarangController@index')->name('barang.index');
		Route::get('create','BarangController@create')->name('barang.create');
		Route::get('edit/{barang}','BarangController@edit')->name('barang.edit');
		Route::get('delete/{barang}','BarangController@destroy')->name('barang.delete');
		Route::post('insert','BarangController@store')->name('barang.insert');
		Route::put('update','BarangController@update')->name('barang.update');
	});

	Route::prefix('barang-keluar')->group(function(){
		Route::get('/','BarangKeluarController@index')->name('barang-keluar.index');
		Route::get('create','BarangKeluarController@create')->name('barang-keluar.create');
		Route::get('cetak','BarangKeluarController@cetak')->name('barang-keluar.cetak');
		Route::get('edit/{barang}','BarangKeluarController@edit')->name('barang-keluar.edit');
		Route::get('delete/{barang}','BarangKeluarController@destroy')->name('barang-keluar.delete');
		Route::post('insert','BarangKeluarController@store')->name('barang-keluar.insert');
		Route::put('update','BarangKeluarController@update')->name('barang-keluar.update');
	});

	Route::prefix('peramalan')->group(function(){
		Route::get('/','PeramalanController@index')->name('peramalan.index');
		Route::get('cetak','PeramalanController@cetak')->name('peramalan.cetak');
	});

});
