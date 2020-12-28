<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//admin 
Route::post('admin', 'App\Http\Controllers\api\RegisterController@admin');
//alat
Route::post('alat', 'App\Http\Controllers\api\AlatController@store');
Route::get('alat', 'App\Http\Controllers\api\AlatController@getAlat');

//laporan transaksi
Route::get('ltransaksi', 'App\Http\Controllers\api\TransaksiController@lgetTransaksi');
Route::get('lproses', 'App\Http\Controllers\api\TransaksiController@lprosesTransaksi');
Route::get('lju', 'App\Http\Controllers\api\TransaksiController@ljuTransaksi');
Route::get('lsetuju', 'App\Http\Controllers\api\TransaksiController@lsetujuTransaksi');
Route::post('detailUser', 'App\Http\Controllers\api\TransaksiController@detailUser');
Route::post('detailSewa', 'App\Http\Controllers\api\TransaksiController@detailSewa');
Route::get('customer', 'App\Http\Controllers\api\RegisterController@getUser');

//get customer
Route::get('now', 'App\Http\Controllers\api\TransaksiController@now');

// customer
Route::post('register', 'App\Http\Controllers\api\RegisterController@register');
Route::post('login', 'App\Http\Controllers\api\RegisterController@login');
Route::post('show', 'App\Http\Controllers\api\RegisterController@show');

Route::middleware('auth:api')->group( function () {
    //berita
    Route::get('info', 'App\Http\Controllers\api\InfoController@getInfo');
    //transaksi
    Route::get('transaksi', 'App\Http\Controllers\api\TransaksiController@getTransaksi');
    Route::post('proses', 'App\Http\Controllers\api\TransaksiController@prosesTransaksi');
    Route::post('ju', 'App\Http\Controllers\api\TransaksiController@juTransaksi');
    Route::post('setuju', 'App\Http\Controllers\api\TransaksiController@setujuTransaksi');
    Route::post('transaksi', 'App\Http\Controllers\api\TransaksiController@store');

    //config
    Route::post('config', 'App\Http\Controllers\api\ConfigController@getConfig');

});


