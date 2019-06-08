<?php

namespace App\Http\Controllers;

use App\RajaOngkirAPI;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // verified
	public function tampilHalamanUbahPassword()
	{
		return view('ubah-password');
	}

    // verified
	public function ubahPassword()
	{
		$user = Auth::user();
		$this->validate(request(), [
			'password_lama' => 'required|valid_password:' . $user->password,
			'password_baru' => 'required|confirmed'
		]);
		$user->updatePassword(request('password_baru'));
		return back()->with('flash', 'Password Berhasil Diubah');
	}

    // verified
	public function tampilHalamanLogin()
	{
		return view('auth.login');
	}

    // verified
	public function tampilHalamanRegisterPelanggan()
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
		}else{
			throw ValidationException::withMessages([
				'email' => [trans('auth.failed')],
			]);
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
	public function registerPelanggan()
	{
		$this->validate(request(), [
			'nama' => 'required',
			'email' => 'required|unique:users',
			'password' => 'required|confirmed',
			'nomor_telepon' => 'required',
		]);	
		$user = User::buatPelanggan(request('nama'), request('email'), request('password'), request('nomor_telepon'));
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
		$path = '';
		if (request('gambar')) {
			$path = request('gambar')->store('konfeksi', 'public');
		}
		$user = User::buatKonfeksi(request('nama'), request('email'), request('password'), request('nomor_telepon'), request('alamat'), request('kota'), request('deskripsi'), $path);
		Auth::guard()->login($user);
		return redirect('/konfeksi')->with('flash', 'Konfeksi berhasil terdaftar dan menunggu verifikasi oleh admin');	
	}
}
