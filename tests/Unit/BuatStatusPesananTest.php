<?php

namespace Tests\Unit;

use App\Pesanan;
use App\StatusPesanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class BuatStatusPesananTest extends TestCase
{
	protected function setUp(): void
	{
		parent::setUp();
		$this->pesanan = Pesanan::create([
			'user_id' => $this->user->id,
			'produk_id' => $this->produk->id,
			'kode_pesanan' => rand(1000000, 9999999),
			'catatan' => 'Jaket dengan bahan denim',
			'file_desain' => $file = UploadedFile::fake()->image('random.jpg'),
			'jumlah' => '{"S":"12","M":"2","L":0,"XL":0}',
			'kurir' => 'jne REG'
		]);
		StatusPesanan::buat($this->pesanan->id, 'pesanan selesai');
	}

	/** @test */
	public function jalur_1()
	{
		$result = StatusPesanan::buat($this->pesanan->id, 'pesanan selesai');
		$this->assertEquals(1, StatusPesanan::count());
		$this->assertNull($result);
	}

	/** @test */
	public function jalur_2()
	{
		$result = StatusPesanan::buat($this->pesanan->id, 'pesanan terkirim');
		$this->assertEquals(2, StatusPesanan::count());
		$this->assertNotNull($result);
	}
}
