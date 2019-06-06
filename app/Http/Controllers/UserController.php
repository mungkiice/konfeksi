<?php

namespace App\Http\Controllers;

use App\RajaOngkirAPI;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	public function tampilHalamanUbahPassword()
	{
		return view('ubah-password');
	}

	public function ubahPassword()
	{
		$user = Auth::user();
		$this->validate(request(), [
			'password_lama' => 'required|valid_password:' . $user->password,
			'password_baru' => 'required|confirmed'
		]);
		$user->update([
			'password' => bcrypt(request('password_baru'))
		]);
		return back()->with('flash', 'Password Berhasil Diubah');
	}

    // verified
	public function tampilHalamanLogin()
	{
		return view('auth.login');
	}

    // verified
	public function tampilHalamanRegisterMember()
	{
		return view('auth.register');	
	}

    // verified
	public function tampilHalamanRegisterKonfeksi()
	{
		$kotas = RajaOngkirAPI::daftarKota();
		return view('auth.register_konfeksi', compact('kotas'));
	}

    // verified
	public function login()
	{
		if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
			if(Auth::user()->role == 'Admin'){
				return redirect('/admin');
			}elseif(Auth::user()->role == 'Konfeksi'){
				return redirect('/konfeksi');
			}else{
				return redirect('/');
			}
		}	
	}

    // verified
	public function logout()
	{
		Auth::logout();
		request()->session()->invalidate();
		return redirect('/home');
	}

    // verified
	public function registerMember()
	{
		$this->validate(request(), [
			'nama' => 'required',
			'email' => 'required|unique:users',
			'password' => 'required|confirmed',
			'nomor_telepon' => 'required',
		]);	
		$user = User::create([
			'nama' => request('nama'),
			'email' => request('email'),
			'password' => Hash::make(request('password')),
			'nomor_telepon' => request('nomor_telepon'),
		]);
		Auth::guard()->login($user);
		return redirect('/home');
	}

    // verified
	public function registerKonfeksi()
	{
		$this->validate(request(), [
			'nama' => 'required',
			'email' => 'required|unique:users',
			'password' => 'required|confirmed',
			'nomor_telepon' => 'required',
			'alamat' => 'required',
			'kota' => 'required',
			'deskripsi' => 'required',
			'gambar' => 'required',
		]);
		$cityName = '';
		foreach (RajaOngkirAPI::daftarKota() as $city) {
			if ($city['city_id'] == request('kota')) {
				$cityName = $city['type'] . ' ' . $city['city_name'];
				break;
			}
		}
		$user = User::create([
			'nama' => request('nama'),
			'email' => request('email'),
			'password' => Hash::make(request('password')),
			'nomor_telepon' => request('nomor_telepon'),
			'role' => 'Konfeksi'
		]);
		$path = '';
		if (request('gambar')) {
			$path = request('gambar')->store('konfeksi', 'public');
		}
		$user->konfeksi()->create([
			'alamat' => request('alamat'),
			'kota' => $cityName,
			'kota_id' => request('kota'),
			'deskripsi' => request('deskripsi'),
			'gambar' => $path,
		]);
		Auth::guard()->login($user);
		return redirect('/konfeksi')->with('flash', 'Konfeksi berhasil terdaftar dan menunggu verifikasi oleh admin');	
	}
}
