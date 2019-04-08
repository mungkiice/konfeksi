<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'nomor_telepon' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nomor_telepon' => $data['nomor_telepon']
        ]);
    }

    public function showKonfeksiRegistrationForm()
    {
        return view('auth.register_konfeksi');
    }

    public function konfeksiRegister(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_telepon' => $request->nomor_telepon,
            'role' => 'Konfeksi'
        ]);
        $path = '';
        if ($request->hasFile('gambar')) {
            $path = $request->gambar->store('konfeksi', 'public');
        }
        $user->konfeksi()->create([
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path
        ]);
        $this->guard()->login($user);
        return redirect('/konfeksi');
    }
}
