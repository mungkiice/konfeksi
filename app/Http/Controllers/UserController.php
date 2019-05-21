<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
	public function showChangePasswordForm()
	{
		return view('ubah-password');
	}

	public function changePassword(Request $request)
	{
		$user = Auth::user();
		$this->validate($request, [
			'password_lama' => 'required|valid_password:' . $user->password,
			'password_baru' => 'required|confirmed'
		]);
		$user->update([
			'password' => bcrypt($request->password_baru)
		]);
		if ($user->isKonfeksi()) {
			return redirect('/konfeksi')->with('flash', 'Password Berhasil Diubah');
		}
		return redirect('/')->with('flash', 'Password Berhasil Diubah');
	}
}
