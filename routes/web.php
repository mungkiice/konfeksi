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
Route::get('/test', function(){
	if (request()->wantsJson()) {
		return 'true';
	}else{
		return 'false';
	}
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'UserController@tampilHalamanLogin')->middleware('guest');
Route::post('/login', 'UserController@login')->middleware('guest');
Route::post('/logout', 'UserController@logout')->middleware('auth');

Route::get('/user/password/edit', 'UserController@tampilHalamanUbahPassword')->middleware('role:member,konfeksi');
Route::post('/user/password/edit', 'UserController@ubahPassword')->middleware('role:member,konfeksi');
Route::get('/register', 'UserController@tampilHalamanRegisterMember')->middleware('guest');
Route::post('/register', 'UserController@registerMember')->middleware('guest');
Route::get('/register/konfeksi', 'UserController@tampilHalamanRegisterKonfeksi')->middleware('guest');
Route::post('/register/konfeksi', 'UserController@registerKonfeksi')->middleware('guest');

Route::get('messages/{kodePesanan}', 'PesanController@listPesan');
Route::post('messages/{kodePesanan}', 'PesanController@kirimPesan');

Route::get('/kurir/{asal}/{tujuan}', 'KurirController@infoEkspedisi');
Route::get('/checkpoint/{kodePesanan}', 'KurirController@checkpoints');
Route::get('/konfeksis', 'KonfeksiController@index');
Route::get('/konfeksis/{konfeksiId}', 'KonfeksiController@show');
Route::get('/produks/{produkId}', 'ProdukController@show');
Route::get('/pembayaran/{kodePesanan}', 'PesananController@pembayaranLunas')->middleware('role:member');
Route::post('/pesan', 'PesananController@store')->middleware('role:member');
Route::post('/pesan/finish', 'PenawaranController@finish');
Route::post('/notification/handler', 'PesananController@notificationHandler');
Route::get('/pesan/{produkId}', 'PesananController@create')->middleware('role:member');
Route::get('/pesanansaya', 'PesananController@indexMember')->middleware('role:member');
Route::get('/pesanansaya/{kodePesanan}/cetak', 'PesananController@cetakBukti')->middleware('role:member');
Route::get('/penawaran/{kodePesanan}', 'PenawaranController@show')->middleware('role:member');
Route::post('/penawaran/{penawaranId}/konfirmasi', 'PenawaranController@konfirmasi')->middleware('role:member');

Route::post('/ulasan', 'UlasanController@store')->middleware('role:member');

Route::get('/diskusi/{kodePesanan}', 'PesanController@listPesan');
Route::post('/diskusi/{kodePesanan}', 'PesanController@kirimPesan');

Route::prefix('admin')->group(function(){
	Route::get('/', 'HomeController@adminDashboard')->middleware('role:admin');	
	Route::get('/artikel', 'ArtikelController@index')->middleware('role:admin');	
	Route::get('/artikel/create', 'ArtikelController@create')->middleware('role:admin');
	Route::post('/artikel/create', 'ArtikelController@store')->middleware('role:admin');
	Route::delete('/artikel/{artikelId}', 'ArtikelController@destroy')->middleware('role:admin');
	Route::get('/artikel/{artikelId}/edit', 'ArtikelController@edit')->middleware('role:admin');
	Route::put('/artikel/{artikelId}/edit', 'ArtikelController@update')->middleware('role:admin');

	Route::get('/konfeksi', 'KonfeksiController@listKonfeksi')->middleware('role:admin');
	Route::post('/konfeksi/{konfeksiId}', 'KonfeksiController@verify')->middleware('role:admin');
});


Route::prefix('konfeksi')->group(function(){
	Route::get('/', 'HomeController@konfeksiDashboard')->middleware('role:konfeksi');	
	Route::get('/produk', 'ProdukController@index')->middleware('role:konfeksi');
	Route::post('/produk', 'ProdukController@store')->middleware('role:konfeksi');
	Route::get('/produk/create', 'ProdukController@create')->middleware('role:konfeksi');
	Route::put('/produk/{produkId}', 'ProdukController@update')->middleware('role:konfeksi');
	Route::delete('/produk/{produkId}', 'ProdukController@destroy')->middleware('role:konfeksi');
	Route::get('/produk/{produkId}/edit', 'ProdukController@edit')->middleware('role:konfeksi');

	Route::get('/pesanan', 'PesananController@index')->middleware('role:konfeksi');
	Route::get('/pesanan/{pesananId}', 'PesananController@show')->middleware('role:konfeksi');
	Route::post('/pesanan/{pesananId}', 'PesananController@updateStatus')->middleware('role:konfeksi');

	Route::get('/penawaran/{pesananId}/create', 'PenawaranController@create')->middleware('role:konfeksi');
	Route::post('/penawaran/{pesananId}/create', 'PenawaranController@store')->middleware('role:konfeksi');
});
