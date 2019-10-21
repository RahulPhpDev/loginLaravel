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
	Route::get('/login', 'AdminLoginController@showloginForm')->name('admin.login');
	Route::post('/savelogin', 'AdminLoginController@savelogin')->name('admin.login.submit');

	Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
});

Route::prefix('customer')->group(function(){
	Route::get('/login', 'CustomerLoginController@showloginForm')->name('customer.login');
	Route::post('/savelogin', 'CustomerLoginController@savelogin')->name('customer.login.submit');

	Route::get('/', 'CustomerController@dashboard')->name('customer.dashboard');
});
