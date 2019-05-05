<?php

namespace Tests\Unit;

use App\Penawaran;
use App\Pesanan;
use App\Produk;
use App\StatusPesanan;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BuatPenawaranTest extends TestCase
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
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/konfeksi/penawaran/'.$this->pesanan->id.'/create', [
			'biaya' => 10000000,
			'tenggat_waktu' => null,
			'gambar' => null,
			'deskripsi' => 'deskripsi tambahan'
		]);
		$this->assertEquals(0, Penawaran::count());
		$this->assertEquals(0, StatusPesanan::count());
		$response->assertSessionHasErrors('tenggat_waktu');
	}

	/** @test */
	public function jalur_2()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/konfeksi/penawaran/'.$this->pesanan->id.'/create', [
			'biaya' => null,
			'tenggat_waktu' => Carbon::now(),
			'gambar' => null,
			'deskripsi' => 'deskripsi tambahan'
		]);
		$this->assertEquals(0, Penawaran::count());
		$this->assertEquals(0, StatusPesanan::count());
		$response->assertSessionHasErrors('biaya');
	}

	/** @test */
	public function jalur_3()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/konfeksi/penawaran/'.$this->pesanan->id.'/create', [
			'biaya' => 10000000,
			'tenggat_waktu' => Carbon::now(),
			'gambar' => null,
			'deskripsi' => 'deskripsi tambahan'
		]);
		$this->assertEquals(1, Penawaran::count());
		$this->assertEquals(1, StatusPesanan::count());
		$response->assertRedirect('/konfeksi');
		$response->assertSessionHas('flash', 'Penawaran berhasil dikirim');
	}

	/** @test */
	public function jalur_4()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/konfeksi/penawaran/'.$this->pesanan->id.'/create', [
			'biaya' => 10000000,
			'tenggat_waktu' => Carbon::now(),
			'gambar' => $file = UploadedFile::fake()->image('penawaran.jpg'),
			'deskripsi' => 'deskripsi tambahan'
		]);
		Storage::disk('public')->assertExists('pesanan/'.$file->hashName());
		$this->assertEquals(1, Penawaran::count());
		$this->assertEquals(1, StatusPesanan::count());
		$response->assertRedirect('/konfeksi');
		$response->assertSessionHas('flash', 'Penawaran berhasil dikirim');
	}
}
