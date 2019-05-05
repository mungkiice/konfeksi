<?php

namespace Tests;

use App\Konfeksi;
use App\Produk;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication;
	use DatabaseMigrations;
	use RefreshDatabase;

	protected $produk;
	protected $konfeksi;
	protected $konfeksiUser;
	protected $user;

	protected function setUp(): void
	{
		parent::setUp();
		Storage::fake('public');
		Notification::fake();
		$this->user = User::create([
			'nama' => 'Muhammad Iqbal Kurniawan',
			'email' => 'm.kurniawanibal@gmail.com',
			'password' => Hash::make('secret'),
			'nomor_telepon' => '081289594061',
			'role' => 'Member'
		]);
		$this->konfeksiUser = User::create([
			'nama' => 'Konfeksi XYZ',
			'email' => 'm.kurniawaniqbal@yahoo.com',
			'password' => Hash::make('secret'),
			'nomor_telepon' => '081289594061',
			'role' => 'Konfeksi'
		]);
		$this->konfeksi = Konfeksi::create([
			'user_id' => $this->konfeksiUser->id,
			'alamat' => 'Jalan Sumbersari 2 No.51',
			'deskripsi' => 'Konfeksi terbaik di malang',
			'diverifikasi' => true,
			'gambar' => UploadedFile::fake()->image('konfeksi.png'),
			'bank_nama' => 'BCA',
			'bank_nomor' => '1237819237',
			'bank_pemilik' => 'Konfeksi XYZ Inc'
		]);
		$this->produk = Produk::create([
			'konfeksi_id' => $this->konfeksi->id,
			'nama' => 'Jaket Parka',
			'deskripsi' => 'Jaket terbaik sepanjang masa',
			'gambar' => UploadedFile::fake()->image('produk.png')
		]);
	}
}
