<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('login', 'LoginController@showFormLogin')->name('login');
Route::post('postLogin', 'App\Http\Controllers\web\LoginController@login')->name('postLogin');
Route::get('register', 'App\Http\Controllers\web\LoginController@showFormRegister')->name('register');
Route::post('postRegister', 'App\Http\Controllers\web\LoginController@register')->name('postRegister');
Route::get('home', 'LoginController@showFormLogin')->name('home');

Route::get('/home', function () {
    return view('menu.content');
});


Auth::routes(['verify' => true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', function () {
})->middleware('verified');

Route::get('email/verify/{id}', 'VerificationApiController@verify')->name('verificationapi.verify');
Route::get('email/resend', 'VerificationApiController@resend')->name('verificationapi.resend');
