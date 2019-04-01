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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');
Route::get('/user/password/edit', 'UserController@showChangePasswordForm');
Route::post('/user/password/edit', 'UserController@changePassword');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register/vendor', 'Auth\RegisterController@showVendorRegistrationForm');
Route::post('/register/vendor', 'Auth\RegisterController@vendorRegister');


Route::get('/vendors', 'VendorController@index');
Route::get('/vendors/{vendorId}', 'VendorController@show');
Route::get('/produk/{produkId}', 'ProdukController@show');

Route::prefix('admin')->group(function(){
	Route::get('/dashboard', 'DashboardController@adminDashboard')->middleware('role:admin');	
	Route::get('/jeniskain', 'JenisKainController@index')->middleware('role:admin');
	Route::put('/jeniskain/{jenisKainId}', 'JenisKainController@update')->middleware('role:admin');
	Route::get('/members', 'UserController@listMember')->middleware('role:admin');
	Route::get('/vendors', 'UserController@listVendor')->middleware('role:admin');
});


Route::prefix('vendor')->group(function(){
	Route::get('/dashboard', 'DashboardController@adminDashboard')->middleware('role:vendor');	
});
