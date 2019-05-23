<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\RajaOngkirAPI;
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
        $kotas = (new RajaOngkirAPI())->getCities();
        return view('auth.register_konfeksi', compact('kotas'));
    }

    public function konfeksiRegister(Request $request)
    {
        $this->validate($request, [
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
        foreach ((new RajaOngkirAPI())->getCities() as $city) {
            if ($city['city_id'] == $request->kota) {
                $cityName = $city['type'] . ' ' . $city['city_name'];
                break;
            }
        }
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
            'kota' => $cityName,
            'kota_id' => $request->kota,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
        ]);
        $this->guard()->login($user);
        return redirect('/konfeksi')->with('flash', 'Konfeksi berhasil terdaftar dan menunggu verifikasi oleh admin');
    }
}
