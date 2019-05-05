<?php

namespace Tests\Unit;

use App\Pesanan;
use App\StatusPesanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class EditStatusPesananTest extends TestCase
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
		$response = $this->post('/konfeksi/pesanan/'.$this->pesanan->id, [
			'keterangan' => 'Pesanan sudah selesai'
		]);
		$this->assertEquals(1, StatusPesanan::count());
		$response->assertSessionHas('flash');
	}

	/** @test */
	public function jalur_2()
	{
		$this->actingAs($this->konfeksiUser);
		$response = $this->post('/konfeksi/pesanan/'.$this->pesanan->id, [
			'keterangan' => null,
		]);
		$this->assertEquals(0, StatusPesanan::count());
		$response->assertSessionHasErrors('keterangan');	
	}
}
