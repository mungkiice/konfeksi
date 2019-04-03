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
Route::get('/produks/{produkId}', 'ProdukController@show');
Route::get('/pesan/{produkId}', 'PesananController@create');
Route::post('/pesan', 'PesananController@store');

Route::prefix('admin')->group(function(){
	Route::get('/', 'DashboardController@adminDashboard')->middleware('role:admin');	
	Route::get('/jeniskain', 'JenisKainController@index')->middleware('role:admin');	
	Route::get('/jeniskain/create', 'JenisKainController@create')->middleware('role:admin');
	Route::post('/jeniskain/create', 'JenisKainController@store')->middleware('role:admin');
	Route::put('/jeniskain/{jenisKainId}', 'JenisKainController@update')->middleware('role:admin');
	Route::delete('/jeniskain/{jenisKainId}', 'JenisKainController@destroy')->middleware('role:admin');

	Route::get('/member', 'UserController@listMember')->middleware('role:admin');
	Route::delete('/member/{userId}', 'UserController@destroyMember')->middleware('role:admin');
	
	Route::get('/vendor', 'VendorController@listVendor')->middleware('role:admin');
	Route::post('/vendor/{vendorId}', 'VendorController@validation')->middleware('role:admin');
	Route::delete('/vendor/{vendorId}', 'VendorController@destroy')->middleware('role:admin');

	Route::get('/file', 'FileController@index')->middleware('role:admin');
});


Route::prefix('vendor')->group(function(){
	Route::get('/', 'DashboardController@adminDashboard')->middleware('role:vendor');	
	Route::get('/produk', 'ProdukController@index')->middleware('role:vendor');
	Route::post('/produk', 'ProdukController@store')->middleware('role:vendor');
	Route::get('/produk/create', 'ProdukController@create')->middleware('role:vendor');
	Route::get('/produk/{produkId}/edit', 'ProdukController@edit')->middleware('role:vendor');
	Route::put('/produk/{produkId}', 'ProdukController@update')->middleware('role:vendor');
	Route::delete('/produk/{produkId}', 'ProdukController@destroy')->middleware('role:vendor');
	Route::post('/produk/{produkId}/tambahGambar', 'ProdukController@addImage')->middleware('role:vendor');
	Route::delete('/produk/{produkId}/{gambarId}/hapusGambar', 'ProdukController@deleteImage')->middleware('role:vendor');

	Route::get('/ulasan', 'UlasanController@index')->middleware('role:vendor');

	Route::get('/komplain', 'KomplainController@index')->middleware('role:vendor');

	Route::get('/pesanan', 'PesananController@index')->middleware('role:vendor');
});
