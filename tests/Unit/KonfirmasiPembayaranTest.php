<?php

namespace Tests\Unit;

use App\KonfirmasiPembayaran;
use App\Pesanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KonfirmasiPembayaranTest extends TestCase
{
	protected $pesanan;

	protected function setUp(): void
	{
		parent::setUp();
		$this->pesanan = Pesanan::create([
			'user_id' => $this->user->id,
			'produk_id' => $this->produk->id,
			'kode_pesanan' => rand(1000000, 9999999),
			'deskripsi' => 'Jaket dengan bahan denim',
			'file_desain' => $file = UploadedFile::fake()->image('random.jpg'),
			'jumlah' => '{"S":"12","M":"2","L":0,"XL":0}',
		]);
	}

	/** @test */
	public function jalur_1()
	{
		$this->actingAs($this->user);
		$response = $this->post('/pembayaran', [
			'kode_pesanan' => $this->pesanan->kode_pesanan,
			'gambar' => $file = UploadedFile::fake()->image('bukti.png')
		]);
		Storage::disk('public')->assertExists('pembayaran/', $file->hashName());
		$this->assertEquals(1, KonfirmasiPembayaran::count());
		$response->assertRedirect('/');
		$response->assertSessionHas('flash');
	}

	/** @test */
	public function jalur_2()
	{
		$this->actingAs($this->user);
		$response = $this->post('/pembayaran', [
			'kode_pesanan' => $this->pesanan->kode_pesanan,
			'gambar' => null
		]);
		$this->assertEquals(0, KonfirmasiPembayaran::count());
		$response->assertSessionHasErrors('gambar');
	}
}
