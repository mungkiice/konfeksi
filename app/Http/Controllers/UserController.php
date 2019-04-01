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
		return view('change-password');
	}

	public function changePassword(Request $request)
	{
		Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
			return Hash::check($value, current($parameters));
		}, 'The old password is wrong');
		$user = Auth::user();
		$this->validate($request, [
			'old_password' => 'required|old_password:' . $user->password,
			'new_password' => 'required|confirmed'
		]);
		$user->update([
			'password' => bcrypt($request->new_password)
		]);

		if ($user->isVendor()) {
			return redirect('/vendor/dashboard')->with('flash', 'password berhasil diubah');
		}
		return back()->with('flash', 'password berhasil diubah');
	}

	public function listMember()
	{
		$users = User::where('role', 'Member')->get();
		return view('admin.members', compact('users'));
	}

	public function listvendor()
	{
		$users = User::where('role', 'Vendor')->get();
		return view('admin.vendors', compact('users'));
	}

	public function destroyMember($userId)
	{
		$user = User::find($userId);
		if($user != null){
			$user->delete();
		}
		return back()->with('flash', 'member berhasil dihapus');	
	}

	public function destroyVendor($userId)
	{
		$user = User::find($userId);
		if($user != null){
			if($user->vendor != null){				
				$user->vendor->delete();
			}
			$user->delete();
		}
		return back()->with('flash', 'vendor berhasil dihapus');
	}
}
