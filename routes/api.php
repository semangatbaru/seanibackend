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

Route::post('register', 'App\Http\Controllers\api\RegisterController@register');
Route::post('login', 'App\Http\Controllers\api\RegisterController@login');

Route::post('show', 'App\Http\Controllers\api\RegisterController@show');

Route::post('admin', 'App\Http\Controllers\api\RegisterController@admin');

Route::get('email/verify/{id}', 'VerificationApiController@verify')->name('verificationapi.verify');
Route::get('email/resend', 'VerificationApiController@resend')->name('verificationapi.resend');

   
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group( function () {

    //alat
    Route::post('alat', 'App\Http\Controllers\api\AlatController@store');
    Route::get('alat', 'App\Http\Controllers\api\AlatController@getAlat');
    //berita
    Route::get('info', 'App\Http\Controllers\api\InfoController@getInfo');
    //transaksi
    Route::get('transaksi', 'App\Http\Controllers\api\TransaksiController@getTransaksi');
    Route::get('proses', 'App\Http\Controllers\api\TransaksiController@prosesTransaksi');
    Route::get('ju', 'App\Http\Controllers\api\TransaksiController@juTransaksi');
    Route::get('setuju', 'App\Http\Controllers\api\TransaksiController@setujuTransaksi');
    Route::post('transaksi', 'App\Http\Controllers\api\TransaksiController@store');

    //config
    Route::post('config', 'App\Http\Controllers\api\ConfigController@getConfig');

});
