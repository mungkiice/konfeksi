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
			'old_password' => 'required|old_password:' . $user->password,
			'new_password' => 'required|confirmed'
		]);
		$user->update([
			'password' => bcrypt($request->new_password)
		]);
		if ($user->isKonfeksi()) {
			return redirect('/konfeksi')->with('flash', 'Password Berhasil Diubah');
		}
		return redirect('/')->with('flash', 'Password Berhasil Diubah');
	}
}
