<?php

use App\Mail\BuktiPemesananMail;
use App\Pesanan;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

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
Route::get('/email', 'HomeController@email');
Route::get('/print', function () {
	$pesanan = Pesanan::first();
	$pdf = PDF::loadView('mail.bukti-pemesanan', compact('pesanan'));
	Mail::to($pesanan->user)->send(new BuktiPemesananMail($pesanan, $pdf));
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->middleware('role:member,admin,konfeksi');
Route::get('/user/password/edit', 'UserController@showChangePasswordForm');
Route::post('/user/password/edit', 'UserController@changePassword');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register/konfeksi', 'Auth\RegisterController@showKonfeksiRegistrationForm');
Route::post('/register/konfeksi', 'Auth\RegisterController@konfeksiRegister');


Route::get('/konfeksis', 'KonfeksiController@index');
Route::get('/konfeksis/{konfeksiId}', 'KonfeksiController@show');
Route::get('/produks/{produkId}', 'ProdukController@show');
Route::get('/pembayaran/{pesananId}', 'KonfirmasiPembayaranController@create')->middleware('role:member');
Route::post('/pembayaran', 'KonfirmasiPembayaranController@store')->middleware('role:member');
Route::get('/pesan/{produkId}', 'PesananController@create')->middleware('role:member');
Route::post('/pesan', 'PesananController@store')->middleware('role:member');
Route::get('/pesanansaya', 'PesananController@indexMember')->middleware('role:member');
Route::get('/penawaran/{kodePesanan}', 'PenawaranController@show')->middleware('role:member');
Route::post('/penawaran/{penawaranId}/terima', 'PenawaranController@confirm')->middleware('role:member');
Route::post('/penawaran/{penawaranId}/tolak', 'PenawaranController@reject')->middleware('role:member');

Route::prefix('admin')->group(function(){
	Route::get('/', 'DashboardController@adminDashboard')->middleware('role:admin');	
	Route::get('/artikel', 'ArtikelController@index')->middleware('role:admin');	
	Route::get('/artikel/create', 'ArtikelController@create')->middleware('role:admin');
	Route::get('/artikel/{artikelId}/edit', 'ArtikelController@edit')->middleware('role:admin');
	Route::post('/artikel/create', 'ArtikelController@store')->middleware('role:admin');
	Route::put('/artikel/{artikelId}/edit', 'ArtikelController@update')->middleware('role:admin');
	Route::delete('/artikel/{artikelId}', 'ArtikelController@destroy')->middleware('role:admin');

	Route::get('/konfeksi', 'KonfeksiController@listKonfeksi')->middleware('role:admin');
	Route::post('/konfeksi/{konfeksiId}', 'KonfeksiController@verify')->middleware('role:admin');
});


Route::prefix('konfeksi')->group(function(){
	Route::get('/', 'DashboardController@konfeksiDashboard')->middleware('role:konfeksi');	
	Route::get('/produk', 'ProdukController@index')->middleware('role:konfeksi');
	Route::post('/produk', 'ProdukController@store')->middleware('role:konfeksi');
	Route::get('/produk/create', 'ProdukController@create')->middleware('role:konfeksi');
	Route::get('/produk/{produkId}/edit', 'ProdukController@edit')->middleware('role:konfeksi');
	Route::put('/produk/{produkId}', 'ProdukController@update')->middleware('role:konfeksi');
	Route::delete('/produk/{produkId}', 'ProdukController@destroy')->middleware('role:konfeksi');

	Route::get('/pesanan', 'PesananController@index')->middleware('role:konfeksi');
	Route::post('/pesanan/{pesananId}', 'PesananController@updateStatus')->middleware('role:konfeksi');

	Route::get('/penawaran/{pesananId}/create', 'PenawaranController@create')->middleware('role:konfeksi');
	Route::post('/penawaran/{pesananId}/create', 'PenawaranController@store')->middleware('role:konfeksi');
});
